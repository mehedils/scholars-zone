<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Helpers\SeoHelper;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of destinations
     */
    public function index(Request $request)
    {
        $query = Destination::active()->orderBy('order')->orderBy('name');
        
        // Filter by region
        if ($request->has('region') && $request->region) {
            $query->byRegion($request->region);
        }
        
        // Filter by search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }
        
        $destinations = $query->paginate(12);
        $featuredDestinations = Destination::active()->featured()->orderBy('order')->limit(6)->get();
        
        $regions = Destination::active()
            ->whereNotNull('region')
            ->where('region', '!=', '')
            ->distinct()
            ->pluck('region')
            ->sort()
            ->values();
        
        // Set SEO data for destinations index page
        SeoHelper::set([
            'title' => 'Study Destinations',
            'description' => 'Explore top study destinations worldwide. Find the perfect country and university for your international education journey.',
            'keywords' => 'study destinations, study abroad countries, international universities, study in USA, study in UK, study in Canada, study in Australia, study in Germany',
            'type' => 'website'
        ]);
        
        return view('frontend.destinations.index', compact('destinations', 'featuredDestinations', 'regions'));
    }

    /**
     * Display the specified destination
     */
    public function show(Destination $destination)
    {
        if (!$destination->is_active) {
            abort(404);
        }
        
        // Get related destinations
        $relatedDestinations = Destination::active()
            ->where('id', '!=', $destination->id)
            ->where('region', $destination->region)
            ->orderBy('order')
            ->limit(3)
            ->get();
            
        // If no related destinations in same region, get any other active destinations
        if ($relatedDestinations->isEmpty()) {
            $relatedDestinations = Destination::active()
                ->where('id', '!=', $destination->id)
                ->orderBy('order')
                ->limit(3)
                ->get();
        }
        
        // Set SEO data for individual destination page
        SeoHelper::set([
            'title' => 'Study in ' . $destination->name,
            'description' => $destination->short_description ?: 'Study in ' . $destination->name . ' with expert guidance from Scholars Global Network. Get admission assistance, visa support, and scholarship opportunities.',
            'keywords' => 'study in ' . $destination->name . ', ' . $destination->name . ' universities, ' . $destination->name . ' education, international students ' . $destination->name,
            'image' => $destination->image ? asset('storage/' . $destination->image) : null,
            'type' => 'article'
        ]);
        
        return view('frontend.destinations.show', compact('destination', 'relatedDestinations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Destination;
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
        
        return view('frontend.destinations.show', compact('destination', 'relatedDestinations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Helpers\SeoHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the homepage with featured destinations
     */
    public function index()
    {
        // Get featured destinations
        $featuredDestinations = Destination::featured()
            ->active()
            ->orderBy('order', 'asc')
            ->take(6)
            ->get();

        // Set SEO data for homepage
        SeoHelper::set([
            'title' => 'Home',
            'description' => 'Discover your dream study destination with Scholars Global Network. Expert guidance for international education, scholarships, and university admissions.',
            'keywords' => 'study abroad, international education, scholarship, university admission, visa assistance, study in USA, study in UK, study in Canada, study in Australia',
            'type' => 'website'
        ]);

        return view('frontend.home', compact('featuredDestinations'));
    }
}

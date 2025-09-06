<?php

namespace App\Http\Controllers;

use App\Helpers\SeoHelper;

class AboutController extends Controller
{
    /**
     * Display the about page
     */
    public function index()
    {
        // Set SEO data for about page
        SeoHelper::set([
            'title' => 'About Us',
            'description' => 'Learn about Scholars Global Network - your trusted partner for international education. Discover our mission, values, and expert team dedicated to your study abroad success.',
            'keywords' => 'about us, study abroad consultants, international education experts, education consulting team, study abroad mission',
            'type' => 'website'
        ]);
        
        return view('frontend.about');
    }
}

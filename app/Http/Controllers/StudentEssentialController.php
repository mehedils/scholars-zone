<?php

namespace App\Http\Controllers;

use App\Models\StudentEssential;
use App\Helpers\SeoHelper;
use Illuminate\Http\Request;

class StudentEssentialController extends Controller
{
    /**
     * Display the our services page with student essentials
     */
    public function index()
    {
        $studentEssentials = StudentEssential::active()->ordered()->get();
        
        // Set SEO data for our services page
        SeoHelper::set([
            'title' => 'Our Services',
            'description' => 'Comprehensive study abroad services including university selection, admission assistance, visa guidance, and scholarship support.',
            'keywords' => 'study abroad services, university admission assistance, visa guidance, scholarship support, education consulting',
            'type' => 'website'
        ]);
        
        return view('frontend.our-services', compact('studentEssentials'));
    }
}

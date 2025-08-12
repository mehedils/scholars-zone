<?php

namespace App\Http\Controllers;

use App\Models\StudentEssential;
use Illuminate\Http\Request;

class StudentEssentialController extends Controller
{
    /**
     * Display the our services page with student essentials
     */
    public function index()
    {
        $studentEssentials = StudentEssential::active()->ordered()->get();
        return view('frontend.our-services', compact('studentEssentials'));
    }
}

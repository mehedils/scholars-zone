<?php

namespace App\Http\Controllers;

use App\Models\Destination;
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

        return view('frontend.home', compact('featuredDestinations'));
    }
}

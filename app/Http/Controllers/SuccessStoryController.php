<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::active()->published()->ordered()->paginate(9);
        return view('frontend.success-stories.index', compact('stories'));
    }

    public function show(SuccessStory $successStory)
    {
        abort_unless($successStory->is_active, 404);
        return view('frontend.success-stories.show', ['story' => $successStory]);
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use App\Models\VideoSuccessStory;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::active()->published()->ordered()->paginate(9);
        $videos = VideoSuccessStory::active()->ordered()->get();
        return view('frontend.success-stories.index', compact('stories', 'videos'));
    }

    public function show(SuccessStory $successStory)
    {
        abort_unless($successStory->is_active, 404);
        return view('frontend.success-stories.show', ['story' => $successStory]);
    }
}



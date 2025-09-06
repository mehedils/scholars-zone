<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use App\Models\VideoSuccessStory;
use App\Helpers\SeoHelper;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::active()->published()->ordered()->paginate(9);
        $videos = VideoSuccessStory::active()->ordered()->get();
        
        // Set SEO data for success stories index page
        SeoHelper::set([
            'title' => 'Success Stories',
            'description' => 'Read inspiring success stories of students who achieved their study abroad dreams with Scholars Global Network. Get motivated for your own journey.',
            'keywords' => 'success stories, study abroad success, student testimonials, international education success, scholarship success stories',
            'type' => 'website'
        ]);
        
        return view('frontend.success-stories.index', compact('stories', 'videos'));
    }

    public function show(SuccessStory $successStory)
    {
        abort_unless($successStory->is_active, 404);
        
        // Set SEO data for individual success story page
        SeoHelper::set([
            'title' => $successStory->title,
            'description' => $successStory->excerpt ?: 'Read the inspiring success story of ' . $successStory->student_name . ' and their journey to study abroad.',
            'keywords' => 'success story, ' . $successStory->student_name . ', study abroad success, ' . $successStory->destination . ' education',
            'image' => $successStory->image ? asset('storage/' . $successStory->image) : null,
            'type' => 'article'
        ]);
        
        return view('frontend.success-stories.show', ['story' => $successStory]);
    }
}



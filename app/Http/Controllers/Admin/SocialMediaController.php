<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of social media platforms
     */
    public function index()
    {
        $platforms = $this->getPlatforms();
        return view('admin.social-media.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new social media platform
     */
    public function create()
    {
        return view('admin.social-media.create');
    }

    /**
     * Store a newly created social media platform
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|string|max:500',
            'color' => 'required|string|max:50',
            'is_phone' => 'boolean',
            'is_username' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $platforms = $this->getPlatforms();
        
        $newPlatform = [
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url,
            'color' => $request->color,
            'hover_color' => 'hover:' . str_replace('text-', 'text-', $request->color) . '-800',
            'enabled' => true,
            'is_phone' => $request->boolean('is_phone'),
            'is_username' => $request->boolean('is_username'),
        ];

        $platforms[] = $newPlatform;
        
        Setting::set('social_platforms', json_encode($platforms));
        Setting::clearCache();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media platform added successfully!');
    }

    /**
     * Show the form for editing the specified social media platform
     */
    public function edit($id)
    {
        $platforms = $this->getPlatforms();
        
        if (!isset($platforms[$id])) {
            return redirect()->route('admin.social-media.index')
                ->with('error', 'Platform not found!');
        }

        $platform = $platforms[$id];
        return view('admin.social-media.edit', compact('platform', 'id'));
    }

    /**
     * Update the specified social media platform
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|string|max:500',
            'color' => 'required|string|max:50',
            'enabled' => 'boolean',
            'is_phone' => 'boolean',
            'is_username' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $platforms = $this->getPlatforms();
        
        if (!isset($platforms[$id])) {
            return redirect()->route('admin.social-media.index')
                ->with('error', 'Platform not found!');
        }

        $platforms[$id] = [
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url,
            'color' => $request->color,
            'hover_color' => 'hover:' . str_replace('text-', 'text-', $request->color) . '-800',
            'enabled' => $request->boolean('enabled'),
            'is_phone' => $request->boolean('is_phone'),
            'is_username' => $request->boolean('is_username'),
        ];

        Setting::set('social_platforms', json_encode($platforms));
        Setting::clearCache();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media platform updated successfully!');
    }

    /**
     * Remove the specified social media platform
     */
    public function destroy($id)
    {
        $platforms = $this->getPlatforms();
        
        if (!isset($platforms[$id])) {
            return redirect()->route('admin.social-media.index')
                ->with('error', 'Platform not found!');
        }

        unset($platforms[$id]);
        
        // Reindex array to maintain sequential keys
        $platforms = array_values($platforms);
        
        Setting::set('social_platforms', json_encode($platforms));
        Setting::clearCache();

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Social media platform deleted successfully!');
    }

    /**
     * Toggle the enabled status of a platform
     */
    public function toggle($id)
    {
        $platforms = $this->getPlatforms();
        
        if (!isset($platforms[$id])) {
            return redirect()->route('admin.social-media.index')
                ->with('error', 'Platform not found!');
        }

        $platforms[$id]['enabled'] = !$platforms[$id]['enabled'];
        
        Setting::set('social_platforms', json_encode($platforms));
        Setting::clearCache();

        $status = $platforms[$id]['enabled'] ? 'enabled' : 'disabled';
        
        return redirect()->route('admin.social-media.index')
            ->with('success', "Platform {$status} successfully!");
    }

    /**
     * Get platforms from settings
     */
    private function getPlatforms()
    {
        $platforms = Setting::get('social_platforms');
        return $platforms ? json_decode($platforms, true) : [];
    }
}

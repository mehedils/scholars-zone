<?php

namespace App\Helpers;

use App\Models\Slider;
use Illuminate\Support\Facades\Cache;

class SliderHelper
{
    /**
     * Get all active sliders ordered by display order
     */
    public static function getActiveSliders()
    {
        return Cache::remember('active_sliders', 3600, function () {
            return Slider::active()->ordered()->get();
        });
    }

    /**
     * Get all sliders (active and inactive) ordered by display order
     */
    public static function getAllSliders()
    {
        return Cache::remember('all_sliders', 3600, function () {
            return Slider::ordered()->get();
        });
    }

    /**
     * Get a specific slider by ID
     */
    public static function getSlider($id)
    {
        return Cache::remember("slider.{$id}", 3600, function () use ($id) {
            return Slider::find($id);
        });
    }

    /**
     * Get the first active slider
     */
    public static function getFirstSlider()
    {
        return Cache::remember('first_slider', 3600, function () {
            return Slider::active()->ordered()->first();
        });
    }

    /**
     * Get sliders count
     */
    public static function getSlidersCount()
    {
        return Cache::remember('sliders_count', 3600, function () {
            return Slider::count();
        });
    }

    /**
     * Get active sliders count
     */
    public static function getActiveSlidersCount()
    {
        return Cache::remember('active_sliders_count', 3600, function () {
            return Slider::active()->count();
        });
    }

    /**
     * Clear all slider cache
     */
    public static function clearCache()
    {
        Cache::forget('active_sliders');
        Cache::forget('all_sliders');
        Cache::forget('first_slider');
        Cache::forget('sliders_count');
        Cache::forget('active_sliders_count');
        
        // Clear individual slider cache
        $sliders = Slider::all();
        foreach ($sliders as $slider) {
            Cache::forget("slider.{$slider->id}");
        }
    }

    /**
     * Get slider data for frontend display
     */
    public static function getSlidersForFrontend()
    {
        $sliders = self::getActiveSliders();
        
        return $sliders->map(function ($slider) {
            return [
                'id' => $slider->id,
                'title' => $slider->title,
                'subtitle' => $slider->subtitle,
                'description' => $slider->description,
                'button_text' => $slider->button_text,
                'button_url' => $slider->button_url,
                'image_url' => $slider->image_url,
                'order' => $slider->order,
            ];
        });
    }

    /**
     * Check if there are any active sliders
     */
    public static function hasActiveSliders()
    {
        return self::getActiveSlidersCount() > 0;
    }

    /**
     * Get slider statistics
     */
    public static function getSliderStats()
    {
        return Cache::remember('slider_stats', 3600, function () {
            return [
                'total' => Slider::count(),
                'active' => Slider::active()->count(),
                'inactive' => Slider::where('is_active', false)->count(),
                'with_images' => Slider::whereNotNull('image')->count(),
                'with_buttons' => Slider::whereNotNull('button_text')->whereNotNull('button_url')->count(),
            ];
        });
    }
}

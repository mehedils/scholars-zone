<?php

namespace App\Helpers;

use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class FeatureHelper
{
    /**
     * Get all active features ordered by display order
     */
    public static function getActiveFeatures()
    {
        return Cache::remember('active_features', 3600, function () {
            return Feature::active()->ordered()->get();
        });
    }

    /**
     * Get all features (active and inactive) ordered by display order
     */
    public static function getAllFeatures()
    {
        return Cache::remember('all_features', 3600, function () {
            return Feature::ordered()->get();
        });
    }

    /**
     * Get a specific feature by ID
     */
    public static function getFeature($id)
    {
        return Cache::remember("feature.{$id}", 3600, function () use ($id) {
            return Feature::find($id);
        });
    }

    /**
     * Get features count
     */
    public static function getFeaturesCount()
    {
        return Cache::remember('features_count', 3600, function () {
            return Feature::count();
        });
    }

    /**
     * Get active features count
     */
    public static function getActiveFeaturesCount()
    {
        return Cache::remember('active_features_count', 3600, function () {
            return Feature::active()->count();
        });
    }

    /**
     * Clear all feature cache
     */
    public static function clearCache()
    {
        Cache::forget('active_features');
        Cache::forget('all_features');
        Cache::forget('features_count');
        Cache::forget('active_features_count');
        
        // Clear individual feature cache
        $features = Feature::all();
        foreach ($features as $feature) {
            Cache::forget("feature.{$feature->id}");
        }
    }

    /**
     * Get feature data for frontend display
     */
    public static function getFeaturesForFrontend()
    {
        $features = self::getActiveFeatures();
        
        return $features->map(function ($feature) {
            return [
                'id' => $feature->id,
                'title' => $feature->title,
                'description' => $feature->description,
                'icon' => $feature->icon,
                'order' => $feature->order,
            ];
        });
    }

    /**
     * Check if there are any active features
     */
    public static function hasActiveFeatures()
    {
        return self::getActiveFeaturesCount() > 0;
    }

    /**
     * Get feature statistics
     */
    public static function getFeatureStats()
    {
        return Cache::remember('feature_stats', 3600, function () {
            return [
                'total' => Feature::count(),
                'active' => Feature::active()->count(),
                'inactive' => Feature::where('is_active', false)->count(),
            ];
        });
    }
}

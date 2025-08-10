<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'content',
        'featured_image',
        'flag_image',
        'region',
        'capital',
        'currency',
        'language',
        'average_tuition_fee',
        'average_living_cost',
        'universities_count',
        'programs_count',
        'highlights',
        'requirements',
        'benefits',
        'is_featured',
        'is_active',
        'order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'highlights' => 'array',
        'requirements' => 'array',
        'benefits' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'average_tuition_fee' => 'decimal:2',
        'average_living_cost' => 'decimal:2',
    ];

    /**
     * Boot the model and add event listeners
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = Str::slug($destination->name);
            }
        });

        static::updating(function ($destination) {
            if ($destination->isDirty('name') && empty($destination->slug)) {
                $destination->slug = Str::slug($destination->name);
            }
        });
    }

    /**
     * Get the route key for the model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include active destinations
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include featured destinations
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to filter by region
     */
    public function scopeByRegion($query, $region)
    {
        return $query->where('region', $region);
    }

    /**
     * Get the featured image URL
     */
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/hero/hero1.jpg'); // Default image
    }

    /**
     * Get the flag image URL
     */
    public function getFlagImageUrlAttribute()
    {
        if ($this->flag_image) {
            return asset('storage/' . $this->flag_image);
        }
        return null;
    }

    /**
     * Get formatted tuition fee
     */
    public function getFormattedTuitionFeeAttribute()
    {
        if ($this->average_tuition_fee) {
            return number_format($this->average_tuition_fee, 0) . ' ' . $this->currency;
        }
        return 'N/A';
    }

    /**
     * Get formatted living cost
     */
    public function getFormattedLivingCostAttribute()
    {
        if ($this->average_living_cost) {
            return number_format($this->average_living_cost, 0) . ' ' . $this->currency;
        }
        return 'N/A';
    }

    /**
     * Get the URL for the destination page
     */
    public function getUrlAttribute()
    {
        return route('destination.show', $this->slug);
    }
}

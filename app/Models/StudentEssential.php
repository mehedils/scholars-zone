<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentEssential extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'learn_more_url',
        'show_learn_more',
        'order',
        'is_active'
    ];

    protected $casts = [
        'show_learn_more' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Scope to get only active student essentials
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order student essentials by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}

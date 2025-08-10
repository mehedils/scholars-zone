<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'preferred_country',
        'study_level',
        'preferred_subject',
        'preferred_intake',
        'message',
        'status',
        'admin_notes',
        'contacted_at'
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Scope for pending consultations
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for active consultations
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['pending', 'contacted']);
    }
}

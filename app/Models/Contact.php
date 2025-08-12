<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_notes',
        'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    // Scope for unread messages
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    // Scope for read messages
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    // Scope for replied messages
    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    // Get short message preview
    public function getMessagePreviewAttribute()
    {
        return strlen($this->message) > 100 ? substr($this->message, 0, 100) . '...' : $this->message;
    }
}

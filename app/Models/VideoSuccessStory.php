<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoSuccessStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'student_name',
        'university',
        'country',
        'description',
        'youtube_video_id',
        'thumbnail_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function getYoutubeEmbedUrlAttribute()
    {
        return "https://www.youtube.com/embed/{$this->youtube_video_id}";
    }

    public function getYoutubeThumbnailUrlAttribute()
    {
        if ($this->thumbnail_url) {
            return $this->thumbnail_url;
        }
        return "https://img.youtube.com/vi/{$this->youtube_video_id}/maxresdefault.jpg";
    }
}

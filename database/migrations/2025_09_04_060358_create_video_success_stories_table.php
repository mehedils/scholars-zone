<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('student_name');
            $table->string('university');
            $table->string('country');
            $table->text('description');
            $table->string('youtube_video_id'); // YouTube video ID (e.g., 'dQw4w9WgXcQ')
            $table->string('thumbnail_url')->nullable(); // YouTube thumbnail URL
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_success_stories');
    }
};

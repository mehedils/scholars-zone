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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('content'); // Rich text content
            $table->string('featured_image')->nullable();
            $table->string('flag_image')->nullable();
            $table->string('region'); // North America, Europe, Asia, etc.
            $table->string('capital')->nullable();
            $table->string('currency')->nullable();
            $table->string('language')->nullable();
            $table->decimal('average_tuition_fee', 10, 2)->nullable();
            $table->decimal('average_living_cost', 10, 2)->nullable();
            $table->integer('universities_count')->default(0);
            $table->integer('programs_count')->default(0);
            $table->json('highlights')->nullable(); // Array of highlights
            $table->json('requirements')->nullable(); // Array of requirements
            $table->json('benefits')->nullable(); // Array of benefits
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\SuccessStoryController as PublicSuccessStoryController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SitemapController;

Route::get("/", [HomeController::class, 'index'])->name('home');

// Frontend Destination Routes
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destination.show');

// Success Stories - Frontend
Route::get('/success-stories', [App\Http\Controllers\SuccessStoryController::class, 'index'])->name('success-stories.index');
Route::get('/success-stories/{successStory:slug}', [App\Http\Controllers\SuccessStoryController::class, 'show'])->name('success-stories.show');

// Our Services Route
Route::get('/our-services', [App\Http\Controllers\StudentEssentialController::class, 'index'])->name('our-services');

// About Page Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Consultation Form Submission
Route::post('/consultation', [App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.store');

// Contact Page Routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');



// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Users Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names('users');
    Route::post('/users/{user}/toggle-status', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('users.toggle-status');
    
    // Destinations Management
    Route::resource('destinations', AdminDestinationController::class)->names('destinations');
    Route::post('/destinations/{destination}/toggle-status', [AdminDestinationController::class, 'toggleStatus'])->name('destinations.toggle-status');
    Route::post('/destinations/{destination}/toggle-featured', [AdminDestinationController::class, 'toggleFeatured'])->name('destinations.toggle-featured');
    Route::post('/destinations/upload-file', [AdminDestinationController::class, 'uploadFile'])->name('destinations.upload-file');
    
    // Consultations Management
    Route::resource('consultations', App\Http\Controllers\Admin\ConsultationController::class)->names('consultations');
    Route::post('/consultations/{consultation}/update-status', [App\Http\Controllers\Admin\ConsultationController::class, 'updateStatus'])->name('consultations.update-status');
    
    // Contact Messages Management
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->names('contacts');
    Route::post('/contacts/{contact}/update-status', [App\Http\Controllers\Admin\ContactController::class, 'updateStatus'])->name('contacts.update-status');
    
    // Settings Routes
    Route::get('/settings/general', [App\Http\Controllers\Admin\SettingsController::class, 'general'])->name('settings.general');
    Route::get('/settings/email', [App\Http\Controllers\Admin\SettingsController::class, 'email'])->name('settings.email');
    Route::get('/settings/security', [App\Http\Controllers\Admin\SettingsController::class, 'security'])->name('settings.security');
    Route::get('/settings/notifications', [App\Http\Controllers\Admin\SettingsController::class, 'notifications'])->name('settings.notifications');
    Route::get('/settings/social', [App\Http\Controllers\Admin\SettingsController::class, 'social'])->name('settings.social');
    Route::post('/settings/update', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'changePassword'])->name('settings.change-password');
    
    // Social Media Management
    Route::resource('social-media', App\Http\Controllers\Admin\SocialMediaController::class)->names('social-media');
    Route::post('/social-media/{id}/toggle', [App\Http\Controllers\Admin\SocialMediaController::class, 'toggle'])->name('social-media.toggle');
    
    // Slider Management
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class)->names('sliders');
    Route::post('/sliders/{id}/toggle', [App\Http\Controllers\Admin\SliderController::class, 'toggle'])->name('sliders.toggle');
    Route::post('/sliders/update-order', [App\Http\Controllers\Admin\SliderController::class, 'updateOrder'])->name('sliders.update-order');
    
    // Feature Management
    Route::resource('features', App\Http\Controllers\Admin\FeatureController::class)->names('features');
    Route::post('/features/{id}/toggle', [App\Http\Controllers\Admin\FeatureController::class, 'toggle'])->name('features.toggle');
    Route::post('/features/update-order', [App\Http\Controllers\Admin\FeatureController::class, 'updateOrder'])->name('features.update-order');
    
    // Student Essentials Management
    Route::resource('student-essentials', App\Http\Controllers\Admin\StudentEssentialController::class)->names('student-essentials');
    Route::post('/student-essentials/{studentEssential}/toggle', [App\Http\Controllers\Admin\StudentEssentialController::class, 'toggle'])->name('student-essentials.toggle');
    Route::post('/student-essentials/update-order', [App\Http\Controllers\Admin\StudentEssentialController::class, 'updateOrder'])->name('student-essentials.update-order');
    
    Route::post('/settings/upload-logo', [App\Http\Controllers\Admin\SettingsController::class, 'uploadLogo'])->name('settings.upload-logo');
    Route::post('/settings/delete-logo', [App\Http\Controllers\Admin\SettingsController::class, 'deleteLogo'])->name('settings.delete-logo');
    Route::get('/settings/{key}', [App\Http\Controllers\Admin\SettingsController::class, 'getSetting'])->name('settings.get');
    
    // Team Members Management
    Route::resource('team-members', App\Http\Controllers\Admin\TeamMemberController::class)->names('team-members');
    // Success Stories Management
    Route::resource('success-stories', App\Http\Controllers\Admin\SuccessStoryController::class)->names('success-stories')->parameters([
        'success-stories' => 'success_story',
    ]);
    Route::post('/success-stories/upload-image', [App\Http\Controllers\Admin\SuccessStoryController::class, 'uploadImage'])->name('success-stories.upload-image');
    
    // Video Success Stories Management
    Route::resource('video-success-stories', App\Http\Controllers\Admin\VideoSuccessStoryController::class)->names('video-success-stories')->parameters([
        'video-success-stories' => 'video_success_story',
    ]);
    Route::post('/video-success-stories/{video_success_story}/toggle', [App\Http\Controllers\Admin\VideoSuccessStoryController::class, 'toggle'])->name('video-success-stories.toggle');
    
    // Profile
    Route::get('/profile', function() {
        return view('admin.profile');
    })->name('profile');
});

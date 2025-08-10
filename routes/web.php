<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::get("/", fn() => view("frontend.home"));

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Users Management
    Route::get('/users', function() {
        return view('admin.users.index');
    })->name('users');
    Route::get('/users/create', function() {
        return view('admin.users.create');
    })->name('users.create');
    Route::get('/users/{user}', function($user) {
        return view('admin.users.show', compact('user'));
    })->name('users.show');
    Route::get('/users/{user}/edit', function($user) {
        return view('admin.users.edit', compact('user'));
    })->name('users.edit');
    
    // Destinations Management
    Route::get('/destinations', function() {
        return view('admin.destinations.index');
    })->name('destinations');
    Route::get('/destinations/create', function() {
        return view('admin.destinations.create');
    })->name('destinations.create');
    Route::get('/destinations/{destination}', function($destination) {
        return view('admin.destinations.show', compact('destination'));
    })->name('destinations.show');
    Route::get('/destinations/{destination}/edit', function($destination) {
        return view('admin.destinations.edit', compact('destination'));
    })->name('destinations.edit');
    
    // Consultations Management
    Route::get('/consultations', function() {
        return view('admin.consultations.index');
    })->name('consultations');
    Route::get('/consultations/{consultation}', function($consultation) {
        return view('admin.consultations.show', compact('consultation'));
    })->name('consultations.show');
    
    // Settings Routes
    Route::get('/settings/general', [App\Http\Controllers\Admin\SettingsController::class, 'general'])->name('settings.general');
    Route::get('/settings/email', [App\Http\Controllers\Admin\SettingsController::class, 'email'])->name('settings.email');
    Route::get('/settings/security', [App\Http\Controllers\Admin\SettingsController::class, 'security'])->name('settings.security');
    Route::get('/settings/notifications', [App\Http\Controllers\Admin\SettingsController::class, 'notifications'])->name('settings.notifications');
    Route::get('/settings/social', [App\Http\Controllers\Admin\SettingsController::class, 'social'])->name('settings.social');
    Route::post('/settings/update', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/upload-logo', [App\Http\Controllers\Admin\SettingsController::class, 'uploadLogo'])->name('settings.upload-logo');
    Route::post('/settings/delete-logo', [App\Http\Controllers\Admin\SettingsController::class, 'deleteLogo'])->name('settings.delete-logo');
    Route::get('/settings/{key}', [App\Http\Controllers\Admin\SettingsController::class, 'getSetting'])->name('settings.get');
    
    // Profile
    Route::get('/profile', function() {
        return view('admin.profile');
    })->name('profile');
});

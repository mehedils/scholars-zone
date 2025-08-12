<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function general()
    {
        $settings = Setting::getByGroup('general');
        return view('admin.settings.general', compact('settings'));
    }

    public function email()
    {
        $settings = Setting::getByGroup('email');
        return view('admin.settings.email', compact('settings'));
    }

    public function security()
    {
        $settings = Setting::getByGroup('security');
        return view('admin.settings.security', compact('settings'));
    }

    public function notifications()
    {
        $settings = Setting::getByGroup('notifications');
        return view('admin.settings.notifications', compact('settings'));
    }

    public function social()
    {
        $settings = Setting::getByGroup('social');
        return view('admin.settings.social', compact('settings'));
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string',
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            'new_password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
        }

        // Check if new password is different from current password
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'New password must be different from current password.'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $settings = $request->input('settings', []);
        
        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                // Handle file upload for logo
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    $file = $request->file("settings.{$key}");
                    
                    // Validate file
                    $fileValidator = Validator::make(['file' => $file], [
                        'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
                    
                    if ($fileValidator->fails()) {
                        continue;
                    }
                    
                    // Delete old logo if exists
                    if ($setting->value && file_exists(public_path($setting->value))) {
                        unlink(public_path($setting->value));
                    }
                    
                    // Store new logo in public directory
                    $fileName = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = 'images/logos/' . $fileName;
                    
                    // Create directory if it doesn't exist
                    $directory = public_path('images/logos');
                    if (!file_exists($directory)) {
                        mkdir($directory, 0755, true);
                    }
                    
                    // Move file to public directory
                    $file->move($directory, $fileName);
                    $value = $path;
                }
                
                // Handle boolean values
                if ($setting->type === 'boolean') {
                    $value = $value ? '1' : '0';
                }
                
                // Handle JSON settings (like social_platforms)
                if ($setting->type === 'json' && is_array($value)) {
                    // Clean up the array and remove empty entries
                    $cleanPlatforms = [];
                    foreach ($value as $platform) {
                        if (!empty($platform['name']) && !empty($platform['icon']) && !empty($platform['url'])) {
                            $cleanPlatforms[] = [
                                'name' => $platform['name'],
                                'icon' => $platform['icon'],
                                'url' => $platform['url'],
                                'color' => $platform['color'] ?? 'text-blue-600',
                                'hover_color' => $platform['hover_color'] ?? 'hover:text-blue-800',
                                'enabled' => isset($platform['enabled']) ? (bool)$platform['enabled'] : true,
                                'is_phone' => isset($platform['is_phone']) ? (bool)$platform['is_phone'] : false,
                                'is_username' => isset($platform['is_username']) ? (bool)$platform['is_username'] : false,
                            ];
                        }
                    }
                    $value = json_encode($cleanPlatforms);
                }
                
                Setting::set($key, $value);
            }
        }

        // Clear cache
        Setting::clearCache();

        return back()->with('success', 'Settings updated successfully!');
    }

    public function uploadLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file format. Please upload an image (JPEG, PNG, JPG, GIF, SVG) under 2MB.'
            ], 422);
        }

        $file = $request->file('logo');
        
        // Delete old logo if exists
        $oldLogo = Setting::get('site_logo');
        if ($oldLogo && file_exists(public_path($oldLogo))) {
            unlink(public_path($oldLogo));
        }
        
        // Store new logo in public directory
        $fileName = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
        $path = 'images/logos/' . $fileName;
        
        // Create directory if it doesn't exist
        $directory = public_path('images/logos');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        
        // Move file to public directory
        $file->move($directory, $fileName);
        Setting::set('site_logo', $path);
        
        return response()->json([
            'success' => true,
            'message' => 'Logo uploaded successfully!',
            'path' => asset($path)
        ]);
    }

    public function deleteLogo()
    {
        $logoPath = Setting::get('site_logo');
        
        if ($logoPath && file_exists(public_path($logoPath))) {
            unlink(public_path($logoPath));
        }
        
        Setting::set('site_logo', null);
        
        return response()->json([
            'success' => true,
            'message' => 'Logo deleted successfully!'
        ]);
    }

    public function getSetting($key)
    {
        $value = Setting::get($key);
        return response()->json(['value' => $value]);
    }
}

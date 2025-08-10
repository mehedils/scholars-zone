<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $groups = ['general', 'email', 'security', 'notifications'];
        $settings = [];
        
        foreach ($groups as $group) {
            $settings[$group] = Setting::getByGroup($group);
        }
        
        return view('admin.settings', compact('settings', 'groups'));
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

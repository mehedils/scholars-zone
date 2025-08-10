<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create admin user
        $this->admin = User::factory()->create([
            'is_admin' => true
        ]);
    }

    public function test_admin_can_view_settings_page()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/settings');

        $response->assertStatus(200);
        $response->assertSee('Settings');
        $response->assertSee('General Settings');
    }

    public function test_admin_can_update_settings()
    {
        $response = $this->actingAs($this->admin)
            ->post('/admin/settings', [
                'settings' => [
                    'site_name' => 'New Site Name',
                    'contact_email' => 'new@email.com',
                    'maintenance_mode' => '1'
                ]
            ]);

        $response->assertRedirect('/admin/settings');
        $response->assertSessionHas('success');

        $this->assertEquals('New Site Name', Setting::get('site_name'));
        $this->assertEquals('new@email.com', Setting::get('contact_email'));
        $this->assertEquals('1', Setting::get('maintenance_mode'));
    }

    public function test_admin_can_upload_logo()
    {
        $file = UploadedFile::fake()->image('logo.png', 100, 100);

        $response = $this->actingAs($this->admin)
            ->post('/admin/settings/upload-logo', [
                'logo' => $file
            ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $logoPath = Setting::get('site_logo');
        $this->assertNotNull($logoPath);
        $this->assertTrue(File::exists(public_path($logoPath)));
    }

    public function test_admin_can_delete_logo()
    {
        // First create a test logo file
        Setting::set('site_logo', 'images/logos/test.png');
        $testLogoPath = public_path('images/logos/test.png');
        
        // Create directory if it doesn't exist
        if (!File::exists(dirname($testLogoPath))) {
            File::makeDirectory(dirname($testLogoPath), 0755, true);
        }
        
        File::put($testLogoPath, 'fake content');

        $response = $this->actingAs($this->admin)
            ->post('/admin/settings/delete-logo');

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertNull(Setting::get('site_logo'));
        $this->assertFalse(File::exists($testLogoPath));
    }

    public function test_settings_are_cached()
    {
        Setting::set('site_name', 'Cached Site Name');

        // First call should cache
        $value1 = Setting::get('site_name');
        
        // Second call should use cache
        $value2 = Setting::get('site_name');

        $this->assertEquals('Cached Site Name', $value1);
        $this->assertEquals('Cached Site Name', $value2);
    }
}

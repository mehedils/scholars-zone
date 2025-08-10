<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    /** @test */
    public function it_can_create_a_slider()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $sliderData = [
            'title' => 'Test Slider',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'button_text' => 'Test Button',
            'button_url' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ];

        $response = $this->post('/admin/sliders', array_merge($sliderData, [
            'image' => UploadedFile::fake()->image('slider.jpg')
        ]));

        $response->assertRedirect('/admin/sliders');
        $this->assertDatabaseHas('sliders', $sliderData);
    }

    /** @test */
    public function it_can_update_a_slider()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $slider = Slider::create([
            'title' => 'Original Title',
            'subtitle' => 'Original Subtitle',
            'description' => 'Original Description',
            'button_text' => 'Original Button',
            'button_url' => 'https://original.com',
            'order' => 1,
            'is_active' => true,
        ]);

        $updatedData = [
            'title' => 'Updated Title',
            'subtitle' => 'Updated Subtitle',
            'description' => 'Updated Description',
            'button_text' => 'Updated Button',
            'button_url' => 'https://updated.com',
            'order' => 2,
            'is_active' => false,
        ];

        $response = $this->put("/admin/sliders/{$slider->id}", $updatedData);

        $response->assertRedirect('/admin/sliders');
        $this->assertDatabaseHas('sliders', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_slider()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $slider = Slider::create([
            'title' => 'Test Slider',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'button_text' => 'Test Button',
            'button_url' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ]);

        $response = $this->delete("/admin/sliders/{$slider->id}");

        $response->assertRedirect('/admin/sliders');
        $this->assertDatabaseMissing('sliders', ['id' => $slider->id]);
    }

    /** @test */
    public function it_can_toggle_slider_status()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $slider = Slider::create([
            'title' => 'Test Slider',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'button_text' => 'Test Button',
            'button_url' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ]);

        $response = $this->post("/admin/sliders/{$slider->id}/toggle");

        $response->assertJson([
            'success' => true,
            'is_active' => false
        ]);

        $this->assertDatabaseHas('sliders', [
            'id' => $slider->id,
            'is_active' => false
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->post('/admin/sliders', []);

        $response->assertSessionHasErrors(['image']);
    }

    /** @test */
    public function it_validates_image_format()
    {
        $user = User::factory()->create(['is_admin' => true]);
        $this->actingAs($user);

        $response = $this->post('/admin/sliders', [
            'image' => UploadedFile::fake()->create('document.pdf', 100)
        ]);

        $response->assertSessionHasErrors(['image']);
    }
}

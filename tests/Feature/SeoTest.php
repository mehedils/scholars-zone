<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\SeoHelper;
use App\Helpers\SettingsHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_seo_helper_sets_and_gets_data()
    {
        $seoData = [
            'title' => 'Test Page',
            'description' => 'Test description',
            'keywords' => 'test, keywords',
            'type' => 'article'
        ];

        SeoHelper::set($seoData);

        $this->assertEquals('Test Page', SeoHelper::get('title'));
        $this->assertEquals('Test description', SeoHelper::get('description'));
        $this->assertEquals('test, keywords', SeoHelper::get('keywords'));
        $this->assertEquals('article', SeoHelper::get('type'));
    }

    public function test_seo_helper_returns_fallback_values()
    {
        // Clear any existing SEO data
        SeoHelper::clear();

        $title = SeoHelper::getTitle();
        $description = SeoHelper::getDescription();
        $keywords = SeoHelper::getKeywords();

        $this->assertNotEmpty($title);
        $this->assertNotEmpty($description);
        $this->assertNotEmpty($keywords);
    }

    public function test_homepage_has_seo_meta_tags()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('Home - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
        $response->assertSee('meta property="og:description"', false);
    }

    public function test_destinations_page_has_seo_meta_tags()
    {
        $response = $this->get('/destinations');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('Study Destinations - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
    }

    public function test_about_page_has_seo_meta_tags()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('About Us - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
    }

    public function test_contact_page_has_seo_meta_tags()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('Contact Us - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
    }

    public function test_our_services_page_has_seo_meta_tags()
    {
        $response = $this->get('/our-services');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('Our Services - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
    }

    public function test_success_stories_page_has_seo_meta_tags()
    {
        $response = $this->get('/success-stories');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('Success Stories - Scholars Global Network', false);
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta property="og:title"', false);
    }
}

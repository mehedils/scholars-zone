<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\SuccessStory;
use App\Helpers\SettingsHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap
     */
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Static pages
        $staticPages = [
            [
                'url' => route('home'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            [
                'url' => route('about'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => route('our-services'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => route('destinations.index'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => route('success-stories.index'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => route('contact'),
                'lastmod' => now()->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ]
        ];

        // Add static pages to sitemap
        foreach ($staticPages as $page) {
            $sitemap .= $this->generateUrlEntry($page);
        }

        // Add destinations
        $destinations = Destination::active()->get();
        foreach ($destinations as $destination) {
            $sitemap .= $this->generateUrlEntry([
                'url' => route('destination.show', $destination),
                'lastmod' => $destination->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.7'
            ]);
        }

        // Add success stories
        $successStories = SuccessStory::active()->published()->get();
        foreach ($successStories as $story) {
            $sitemap .= $this->generateUrlEntry([
                'url' => route('success-stories.show', $story),
                'lastmod' => $story->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.6'
            ]);
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'public, max-age=3600'); // Cache for 1 hour
    }

    /**
     * Generate individual URL entry for sitemap
     */
    private function generateUrlEntry($data)
    {
        $url = '  <url>' . "\n";
        $url .= '    <loc>' . htmlspecialchars($data['url']) . '</loc>' . "\n";
        $url .= '    <lastmod>' . $data['lastmod'] . '</lastmod>' . "\n";
        $url .= '    <changefreq>' . $data['changefreq'] . '</changefreq>' . "\n";
        $url .= '    <priority>' . $data['priority'] . '</priority>' . "\n";
        $url .= '  </url>' . "\n";
        
        return $url;
    }

    /**
     * Generate robots.txt content
     */
    public function robots()
    {
        $siteUrl = SettingsHelper::get('site_url', request()->getSchemeAndHttpHost());
        $sitemapUrl = $siteUrl . '/sitemap.xml';
        
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n";
        $robots .= "Disallow: /admin/\n";
        $robots .= "Disallow: /login\n";
        $robots .= "Disallow: /storage/\n";
        $robots .= "Disallow: /vendor/\n";
        $robots .= "Disallow: /node_modules/\n";
        $robots .= "\n";
        $robots .= "Sitemap: " . $sitemapUrl . "\n";

        return response($robots, 200)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Generate sitemap index (for large sites with multiple sitemaps)
     */
    public function indexSitemap()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        $siteUrl = SettingsHelper::get('site_url', request()->getSchemeAndHttpHost());
        
        // Main sitemap
        $sitemap .= '<sitemap>';
        $sitemap .= '<loc>' . $siteUrl . '/sitemap.xml</loc>';
        $sitemap .= '<lastmod>' . now()->format('Y-m-d') . '</lastmod>';
        $sitemap .= '</sitemap>';
        
        $sitemap .= '</sitemapindex>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}

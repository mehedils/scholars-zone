<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Storage;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and cache the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');
        
        $controller = new SitemapController();
        $response = $controller->index();
        
        // Save to public directory
        $sitemapContent = $response->getContent();
        Storage::disk('public')->put('sitemap.xml', $sitemapContent);
        
        // Also save to public root for direct access
        file_put_contents(public_path('sitemap.xml'), $sitemapContent);
        
        $this->info('Sitemap generated successfully!');
        $this->info('File saved to: ' . public_path('sitemap.xml'));
        $this->info('URL: ' . url('sitemap.xml'));
        
        return 0;
    }
}

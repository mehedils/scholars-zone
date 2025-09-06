<?php

namespace App\Helpers;

use App\Models\Setting;

class SeoHelper
{
    /**
     * Default SEO data
     */
    private static $defaultSeo = [
        'title' => null,
        'description' => null,
        'keywords' => null,
        'image' => null,
        'url' => null,
        'type' => 'website',
        'site_name' => null,
    ];

    /**
     * Current page SEO data
     */
    private static $currentSeo = [];

    /**
     * Set SEO data for current page
     */
    public static function set($data)
    {
        self::$currentSeo = array_merge(self::$defaultSeo, $data);
    }

    /**
     * Get SEO data for current page
     */
    public static function get($key = null)
    {
        if ($key) {
            return self::$currentSeo[$key] ?? null;
        }
        return self::$currentSeo;
    }

    /**
     * Get page title with fallback
     */
    public static function getTitle()
    {
        $title = self::get('title');
        $siteName = SettingsHelper::siteName();
        
        if ($title) {
            return $title . ' - ' . $siteName;
        }
        
        return SettingsHelper::siteTitle();
    }

    /**
     * Get page description with fallback
     */
    public static function getDescription()
    {
        return self::get('description') ?? SettingsHelper::siteDescription();
    }

    /**
     * Get page keywords
     */
    public static function getKeywords()
    {
        return self::get('keywords') ?? SettingsHelper::get('default_seo_keywords', 'study abroad, international education, scholarship, university admission, visa assistance');
    }

    /**
     * Get page image with fallback
     */
    public static function getImage()
    {
        $image = self::get('image');
        if ($image) {
            return $image;
        }
        
        $defaultSeoImage = SettingsHelper::get('default_seo_image');
        if ($defaultSeoImage) {
            return asset($defaultSeoImage);
        }
        
        $siteLogo = SettingsHelper::siteLogo();
        if ($siteLogo) {
            return $siteLogo;
        }
        
        return asset('images/logo.png');
    }

    /**
     * Get page URL
     */
    public static function getUrl()
    {
        return self::get('url') ?? request()->url();
    }

    /**
     * Get page type
     */
    public static function getType()
    {
        return self::get('type') ?? 'website';
    }

    /**
     * Get site name
     */
    public static function getSiteName()
    {
        return self::get('site_name') ?? SettingsHelper::siteName();
    }

    /**
     * Generate structured data for JSON-LD
     */
    public static function getStructuredData()
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => self::getSiteName(),
            'url' => SettingsHelper::get('site_url', request()->getSchemeAndHttpHost()),
            'logo' => self::getImage(),
            'description' => self::getDescription(),
        ];

        // Add contact information if available
        if (SettingsHelper::contactEmail()) {
            $data['email'] = SettingsHelper::contactEmail();
        }

        if (SettingsHelper::contactPhone()) {
            $data['telephone'] = SettingsHelper::contactPhone();
        }

        if (SettingsHelper::contactAddress()) {
            $data['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => SettingsHelper::contactAddress(),
                'addressCountry' => 'BD'
            ];
        }

        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Clear current SEO data
     */
    public static function clear()
    {
        self::$currentSeo = [];
    }
}

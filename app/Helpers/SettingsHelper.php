<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    /**
     * Get a setting value
     */
    public static function get($key, $default = null)
    {
        return Setting::get($key, $default);
    }

    /**
     * Set a setting value
     */
    public static function set($key, $value)
    {
        return Setting::set($key, $value);
    }

    /**
     * Get site name
     */
    public static function siteName()
    {
        return self::get('site_name', 'Scholars Zone Global');
    }

    /**
     * Get site title
     */
    public static function siteTitle()
    {
        return self::get('site_title', 'Scholars Zone Global - Your Trusted Study Abroad Partner');
    }

    /**
     * Get site description
     */
    public static function siteDescription()
    {
        return self::get('site_description', 'Your trusted partner for international education consulting and study abroad guidance.');
    }

    /**
     * Get site logo URL
     */
    public static function siteLogo()
    {
        $logo = self::get('site_logo');
        return $logo ? asset($logo) : null;
    }

    /**
     * Get contact email
     */
    public static function contactEmail()
    {
        return self::get('contact_email', 'contact@scholarszone.com');
    }

    /**
     * Get contact phone
     */
    public static function contactPhone()
    {
        return self::get('contact_phone', '+1 (555) 123-4567');
    }

    /**
     * Check if maintenance mode is enabled
     */
    public static function isMaintenanceMode()
    {
        return self::get('maintenance_mode', '0') === '1';
    }

    /**
     * Check if user registration is enabled
     */
    public static function isUserRegistrationEnabled()
    {
        return self::get('user_registration', '1') === '1';
    }

    /**
     * Check if email notifications are enabled
     */
    public static function isEmailNotificationsEnabled()
    {
        return self::get('email_notifications', '1') === '1';
    }

    /**
     * Get timezone
     */
    public static function timezone()
    {
        return self::get('timezone', 'America/New_York');
    }

    /**
     * Get date format
     */
    public static function dateFormat()
    {
        return self::get('date_format', 'm/d/Y');
    }

    // Social Media Methods
    /**
     * Check if social media is enabled
     */
    public static function isSocialEnabled()
    {
        return self::get('social_enabled', '1') === '1';
    }

    /**
     * Get Facebook URL
     */
    public static function socialFacebook()
    {
        return self::get('social_facebook');
    }

    /**
     * Get Twitter URL
     */
    public static function socialTwitter()
    {
        return self::get('social_twitter');
    }

    /**
     * Get LinkedIn URL
     */
    public static function socialLinkedIn()
    {
        return self::get('social_linkedin');
    }

    /**
     * Get Instagram URL
     */
    public static function socialInstagram()
    {
        return self::get('social_instagram');
    }

    /**
     * Get YouTube URL
     */
    public static function socialYouTube()
    {
        return self::get('social_youtube');
    }

    /**
     * Get WhatsApp number
     */
    public static function socialWhatsApp()
    {
        return self::get('social_whatsapp');
    }

    /**
     * Get Telegram username
     */
    public static function socialTelegram()
    {
        return self::get('social_telegram');
    }

    /**
     * Get all social media platforms
     */
    public static function getSocialPlatforms()
    {
        $platforms = self::get('social_platforms');
        if ($platforms) {
            return json_decode($platforms, true) ?: [];
        }
        return [];
    }

    /**
     * Get enabled social media platforms
     */
    public static function getEnabledSocialPlatforms()
    {
        $platforms = self::getSocialPlatforms();
        return array_filter($platforms, function($platform) {
            return isset($platform['enabled']) && $platform['enabled'] && !empty($platform['url']);
        });
    }

    /**
     * Get all social media links (legacy method for backward compatibility)
     */
    public static function getAllSocialLinks()
    {
        $platforms = self::getEnabledSocialPlatforms();
        $links = [];
        
        foreach ($platforms as $platform) {
            $key = strtolower($platform['name']);
            $links[$key] = $platform['url'];
        }
        
        return $links;
    }
}

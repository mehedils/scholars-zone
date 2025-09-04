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
        return self::get('site_name', 'Scholars Global Network');
    }

    /**
     * Get site title
     */
    public static function siteTitle()
    {
        return self::get('site_title', 'Scholars Global Network - Your Trusted Study Abroad Partner');
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
        return self::get('contact_email', 'info@scholarsglobalnetwork.com');
    }

    /**
     * Get contact phone
     */
    public static function contactPhone()
    {
        return self::get('contact_phone', '+88 01344-823701');
    }

    /**
     * Get contact address
     */
    public static function contactAddress()
    {
        return self::get('contact_address', 'Level-12, RUPAYAN Latifa Shamsuddin Square, Mirpur-1, Dhaka-1216, Bangladesh');
    }

    /**
     * Get USA office address
     */
    public static function contactAddressUsa()
    {
        return self::get('contact_address_usa', '585 East 16th Street, Brooklyn, New York 11226, USA');
    }

    /**
     * Get business hours
     */
    public static function businessHours()
    {
        return self::get('business_hours', 'From Sunday to Saturday: 10:00 A.M. To 7:00 P.M. (Friday: Closed)');
    }

    /**
     * Get footer email
     */
    public static function footerEmail()
    {
        return self::get('contact_email_footer', 'info@scholarsglobalnetwork.com');
    }

    /**
     * Get secondary email
     */
    public static function secondaryEmail()
    {
        return self::get('contact_email_secondary', 'scholarsglobalnetwork@gmail.com');
    }

    /**
     * Get secondary phone
     */
    public static function secondaryPhone()
    {
        return self::get('contact_phone_secondary', '+88 01344-823702');
    }

    /**
     * Get tertiary phone
     */
    public static function tertiaryPhone()
    {
        return self::get('contact_phone_tertiary', '+88 01344-823703');
    }

    /**
     * Get Google Maps URL
     */
    public static function googleMapsUrl()
    {
        return self::get('google_maps_url', 'https://maps.app.goo.gl/uy7u4SBxvnTJMN2f6');
    }

    /**
     * Get footer phone
     */
    public static function footerPhone()
    {
        return self::get('contact_phone_footer', '+880 1234 567890');
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

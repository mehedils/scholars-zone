<?php

namespace App\Providers;

use App\Helpers\SettingsHelper;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register route middleware alias for admin
        Route::aliasMiddleware('admin', AdminMiddleware::class);

        // Register blade directives for settings
        Blade::directive('setting', function ($expression) {
            return "<?php echo \App\Helpers\SettingsHelper::get($expression); ?>";
        });

        Blade::directive('siteName', function () {
            return "<?php echo \App\Helpers\SettingsHelper::siteName(); ?>";
        });

        Blade::directive('siteTitle', function () {
            return "<?php echo \App\Helpers\SettingsHelper::siteTitle(); ?>";
        });

        Blade::directive('siteLogo', function () {
            return "<?php echo \App\Helpers\SettingsHelper::siteLogo(); ?>";
        });

        Blade::directive('contactEmail', function () {
            return "<?php echo \App\Helpers\SettingsHelper::contactEmail(); ?>";
        });

        Blade::directive('contactPhone', function () {
            return "<?php echo \App\Helpers\SettingsHelper::contactPhone(); ?>";
        });

        // Social Media Directives
        Blade::directive('socialEnabled', function () {
            return "<?php echo \App\Helpers\SettingsHelper::isSocialEnabled(); ?>";
        });

        Blade::directive('socialFacebook', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialFacebook(); ?>";
        });

        Blade::directive('socialTwitter', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialTwitter(); ?>";
        });

        Blade::directive('socialLinkedIn', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialLinkedIn(); ?>";
        });

        Blade::directive('socialInstagram', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialInstagram(); ?>";
        });

        Blade::directive('socialYouTube', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialYouTube(); ?>";
        });

        Blade::directive('socialWhatsApp', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialWhatsApp(); ?>";
        });

        Blade::directive('socialTelegram', function () {
            return "<?php echo \App\Helpers\SettingsHelper::socialTelegram(); ?>";
        });
    }
}

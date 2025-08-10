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
    }
}

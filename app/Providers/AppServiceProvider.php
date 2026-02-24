<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\URL::forceScheme('https');

        // Tambahkan ini juga untuk menangani upload via Proxy Render
        if (config('app.env') !== 'local') {
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
        }
    }
}

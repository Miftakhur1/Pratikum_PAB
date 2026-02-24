<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Filament\Support\Facades\FilamentAsset;

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
        // 1. Paksa semua URL (termasuk CSS/JS) pakai HTTPS
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        // 2. Beritahu Filament agar selalu pakai HTTPS untuk asetnya
        FilamentAsset::register([]); 
    }
}

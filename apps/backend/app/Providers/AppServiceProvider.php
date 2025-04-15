<?php

namespace App\Providers;

use App\Models\Fund;
use App\Observers\FundObserver;
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
        Fund::observe(FundObserver::class);
    }
}

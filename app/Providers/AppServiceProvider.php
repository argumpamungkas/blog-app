<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
    // prevent Lazy Loading
    public function boot(): void
    {
        //
        // agar aplikasi tidak menjalankan lazy loading
        /*
        Model::preventsLazyLoading(); // prevents -> boolean
        Model::preventLazyLoading(); // prevent -> menjalankan method
        */
    }
}

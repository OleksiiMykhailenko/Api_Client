<?php

namespace App\Providers;

use App\Repository\FilmRepository;
use App\Repository\FilmRepositoryInterface;
use App\Service\OmdbService;
use App\Service\OmdbServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app->bind(OmdbServiceInterface::class,
            OmdbService::class);
        $this->app->bind(FilmRepositoryInterface::class,
            FilmRepository::class);
        Schema::defaultStringLength(191);
    }
}

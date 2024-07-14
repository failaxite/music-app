<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;  // Correction de l'importation de la classe Schema
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
        // Empêche le lazy loading en production
        Model::preventLazyLoading(config('app.env') !== 'production');

        // Définir la longueur par défaut des chaînes de caractères pour les index
        Schema::defaultStringLength(191);
    }
}

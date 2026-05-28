<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;

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
        $categorias = \App\Models\Categoria::all();
        view()->share('categorias', $categorias);
       // compartilhar dados em todas as views, para evitar ter que buscar as categorias em cada controller.
    }
}

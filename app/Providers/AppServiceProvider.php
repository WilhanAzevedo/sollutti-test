<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use function Psy\bin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\ProdutosRepositoryInterface', 'App\Repositories\ProdutosRepository');
        $this->app->bind('App\Repositories\Contracts\LojasRepositoryInterface', 'App\Repositories\LojasRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

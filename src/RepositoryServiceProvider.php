<?php

namespace Exitialis\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @throws \Exception
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/mas.php' => config_path('mas.php')], 'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mas.php', 'mas');
    }
}
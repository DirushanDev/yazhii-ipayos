<?php

namespace Yazhii\Ipayos;

use Illuminate\Support\ServiceProvider;

class IpayosServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge the config file
        $this->mergeConfigFrom(__DIR__ . '/../config/ipayos.php', 'ipayos');

        // Register the service
        $this->app->singleton('ipayos', function () {
            return new IpayosService();
        });
    }

    public function boot()
    {
        // Publish the config file
        $this->publishes([
            __DIR__ . '/../config/ipayos.php' => config_path('ipayos.php'),
        ], 'ipayos-config');

        // Load routes, views, and translations
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ipayos');
    }
}

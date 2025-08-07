<?php

namespace Yazhii\Ipayos;

use Illuminate\Support\ServiceProvider;

class IpayosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ipayos.php', 'ipayos');

        $this->app->singleton('ipayos', function () {
            return new IpayosService();
        });
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../config/ipayos.php' => config_path('ipayos.php'),
        ], 'ipayos-config');

        // Load route
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}

<?php

namespace Passport\Providers;

use Passport\Console\GetPassportClient;
use Passport\Observers\ClientObserver;
use Illuminate\Support\ServiceProvider;

class PassportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            GetPassportClient::class
        ]);

        $this->app['config']['hashids.connections.client_id'] = [
            'salt'   => env('APP_KEY'),
            'length' => '32',
        ];

        \Laravel\Passport\Client::observe(ClientObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

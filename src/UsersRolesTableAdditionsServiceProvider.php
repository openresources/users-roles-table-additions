<?php

namespace Openresources\UsersRolesTableAdditions;

use Illuminate\Support\ServiceProvider;

class UsersRolesTableAdditionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('users-roles-table-additions.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'users-roles-table-additions');

        // Register the main class to use with the facade
        $this->app->singleton('users-roles-table-additions', function () {
            return new UsersRolesTableAdditions;
        });
    }
}

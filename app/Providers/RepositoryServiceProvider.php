<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'User',
            'Admin'
        );
        foreach ($models as $model) {
             $this->app->bind("App\Repositories\\{$model}\\{$model}Repository",
                 "App\Repositories\\{$model}\\{$model}Eloquent");
        }
    }
}

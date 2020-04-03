<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	if ($this->app->environment('local', 'testing')) {
        	$this->app->register(DuskServiceProvider::class);
     	}
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/../../bootstrap/helpers/slugify_function.php';
        require_once __DIR__ . '/../../bootstrap/helpers/eventToAgenda_function.php';
        if(config('app.env') === 'production') {
          \URL::forceScheme('https');
        }
    }
}

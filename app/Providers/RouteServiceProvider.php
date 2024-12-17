<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Rate limit products endpoints to 30 requests per minute by user ID
        RateLimiter::for('cnas-check-api', function (Request $request) {
            return Limit::perMinute(10)->by($request->user()?->id);
        });
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapEmployeurRoutes();

        $this->mapAdministrateurRoutes();

        $this->mapSubventionRoutes();

        $this->mapFormationRoutes();

        $this->mapFileRoutes();

        $this->mapAjaxRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapEmployeurRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/employeur.php'));
    }

    protected function mapAdministrateurRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace . "\Administrateur")
             ->group(base_path('routes/administrateur.php'));
    }

    protected function mapSubventionRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/subvention.php'));
    }

    protected function mapFormationRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/formation.php'));
    }

    protected function mapFileRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/file.php'));
    }

    protected function mapAjaxRoutes()
    {
        Route::middleware('web')
                ->namespace($this->namespace . "\Ajax")
                ->group(\base_path('routes/ajax.php'));
    }

}

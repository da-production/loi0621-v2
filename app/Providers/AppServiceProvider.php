<?php

namespace App\Providers;

use App\Directives\DisplaDirectives;
use App\Repository\Employeur\TaskEmployeur;
use App\Repository\Employeur\TaskEmployeurInterface;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Option;
use App\Repository\Demande\Detail;
use App\Repository\Demande\DetailInterface;
use Illuminate\Support\Facades\View;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(TaskEmployeurInterface::class, TaskEmployeur::class);
        $this->app->bind(DetailInterface::class, Detail::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DisplaDirectives::register();
        //
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
            
            // if(preg_match("/www.cnac.dz/i", $_SERVER['SERVER_NAME'])) {
            //     \URL::forceScheme('https');
            // }
        }
        $o = Cache::rememberForever('options', function(){
            return Option::all();
        });

        $options = [];

        foreach ($o as $option) {
            $options[$option->name] = $option->value;
        }

        View::share('options',$options);


        // Log Viewer
        // LogViewer::auth(function ($request) {
        //     return auth()->guard('admin')->user() && auth()->guard('admin')->user()->email == 'aminemebrouki01@gmail.com';
        // });
    }
}

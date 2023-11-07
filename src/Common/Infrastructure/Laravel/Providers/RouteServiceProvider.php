<?php

namespace Src\Common\Infrastructure\Laravel\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group( function() {
                        require base_path('routes/web.php');
                        require base_path('src/Character/Presentation/routes.php');
                    }
                );

            Route::middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('internal_api')
                ->group(function() {
                    // require base_path('src/Auth/Presentation/HTTP/routes.php'); Exemples
                    // require base_path('src/Agenda/User/Presentation/HTTP/routes.php');
                    // require base_path('src/Agenda/Company/Presentation/HTTP/routes.php');
                });
        });
    }
}

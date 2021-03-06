<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::group([
           'middleware' => 'web',
           'namespace' => $this->namespace,
       ], function ($router) {
           require base_path('routes/web.php');
           require base_path('routes/users.php');
           require base_path('routes/posts.php');
           require base_path('routes/comments.php');
           require base_path('routes/categories.php');
           require base_path('routes/projects.php');
           require base_path('routes/tracks.php');
           require base_path('routes/images.php');
           require base_path('routes/schedules.php');
           require base_path('routes/leads.php');
           require base_path('routes/jobs.php');
           require base_path('routes/languages.php');
           require base_path('routes/pages.php');
       });
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Request;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Homepage
        View::composer('pages.page.home', \App\Http\ViewComposers\HomePageViewComposer::class);

        // About us
        View::composer('pages.page.about', \App\Http\ViewComposers\AboutPageViewComposer::class);

        // Admin sidebar navigation
        View::composer([
            'admin.*',
            'post.*',
            'category.*',
            'schedules.*',
            'pages.index',
            'images.image',
            'projects.create'
        ], \App\Http\ViewComposers\AdminSidebareMenuViewComposer::class);

        // Blog / Category / Post breadcrumbs
        View::composer(['pages.blog.*'], \App\Http\ViewComposers\BreadcrumbsViewComposer::class);
    }

    public function register()
    {
        //
    }
}

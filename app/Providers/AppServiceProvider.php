<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        // Register your alias
        $loader = AliasLoader::getInstance();
        $loader->alias('URLHelper', \App\Helpers\URLHelper::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

		// Block size classes
        View::share('global_blocksizes', include resource_path('views/site/blockwidth/blockwidth-array.php'));
    }
}

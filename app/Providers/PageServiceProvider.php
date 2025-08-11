<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;

class PageServiceProvider extends ServiceProvider
{
    public static function getAllNavigationPages()
    {
        return Page::where('hide_from_nav', 0)
            ->where('is_published', 1)
            ->orderBy('sort_order')
            ->get();
    }
}

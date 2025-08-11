<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Page;

Route::get('page/{slug}', function ($slug) {
    $defaultSettings = [
        // Default site configuration
        'global_company_name' => 'Company Name',
        'global_site_title' => 'Staff Portal',
        'global_site_metatitle' => '',
        'global_logo_url' => '/img/default-logo.png',
        'global_favicon_url' => '/img/default-icon.png',
        'global_theme_color_primary' => '#be3144',
        'global_theme_color_secondary' => '#7b31be',

        // Overwritten by controllers
        'global_element_type' => '',
    ];
    foreach($defaultSettings as $key => $value) {
        View::share($key, $value);
    }
    $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('page', compact('page'));
})->where('slug', '[a-zA-Z0-9\-_/]+');
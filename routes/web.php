<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;

Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('page', compact('page'));
})->where('slug', '[a-zA-Z0-9\-_/]+');
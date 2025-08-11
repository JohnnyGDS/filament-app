<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'slug',
        'content',
        'is_published',
        'hide_from_nav',
        'sort_order',
    ];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
        'hide_from_nav' => 'boolean',
    ];

    public function getURL($absolute = false): string
    {
        $url = $absolute ? config('app.url') : '';
        $url .= '/';
        $url .= 'page';
        $url .= '/' . $this->slug;
        return $url;
    }

    // Default ordering
    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('sort_order');
        });
    }
}
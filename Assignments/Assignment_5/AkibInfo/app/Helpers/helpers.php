<?php

use Illuminate\Support\Facades\File;

function getPageTemplate($route_path = '/')
{

    $settings = File::json(storage_path('data/settings.json'))['active_pages'];

    foreach ($settings as $page) {
        if ($route_path == '/') return $page['template'];
        if (array_search($route_path, $page)) {
            return $page['template'];
        }
    }
    return '404';
}

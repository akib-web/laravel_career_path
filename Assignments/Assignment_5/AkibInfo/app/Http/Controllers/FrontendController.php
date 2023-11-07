<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function homeIndex($slug = "/")
    {
        $data['slug'] = $slug;
        $data['settings'] = File::json(storage_path('data/settings.json'));
        $data['profile'] = (object) File::json(storage_path('data/profile.json'));
        $data['experiences'] = (object) File::json(storage_path('data/experiences.json'));
        $data['projects'] = (object) File::json(storage_path('data/projects.json'));
        // dd($data);
        return view("portfolio.profile", $data);
    }

    public function projecDetails($project_slug)
    {
        $data['slug'] = 'projects';
        $data['profile'] = (object) File::json(storage_path('data/profile.json'));
        $data['settings'] = File::json(storage_path('data/settings.json'));
        $projects = (object) File::json(storage_path('data/projects.json'));

        if (!isset($projects->items[$project_slug])) {
            abort(404);
        }

        $data['project'] = $projects->items[$project_slug];
        // dd($data);
        return view("portfolio.project", $data);
    }
}

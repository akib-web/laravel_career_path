<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function homeIndex()
    {
        // $data['profile'] = (object) File::json(storage_path('app/public/profile/profile.json'));
        // $data['profile'] = (object) File::json(public_path('data/profile.json'));
        $data['settings'] = File::json(storage_path('data/settings.json'));
        $data['profile'] = (object) File::json(storage_path('data/profile.json'));
        $data['projects'] = (object) File::json(storage_path('data/projects.json'));

        return view("portfolio.profile", $data);
    }

    public function projecDetails($project_slug)
    {
        $data['settings'] = File::json(storage_path('data/settings.json'));
        $data['projects'] = (object) File::json(storage_path('data/projects.json'));

        return view("portfolio.project", $data);
    }
}

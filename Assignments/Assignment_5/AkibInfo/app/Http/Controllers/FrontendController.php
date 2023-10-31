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
        $data['profile'] = (object) File::json(storage_path('data/profile.json'));

        // dd(storage_path('profile.json'));
        dd($data);
        return view("portfolio.profile", $data);
    }
}
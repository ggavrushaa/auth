<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        return view('user.settings.google.index');
    }

    public function enable()
    {
        session()->put('google_confirmation', true);
        return back();
    }
}

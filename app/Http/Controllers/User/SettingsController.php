<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class SettingsController extends Controller

{
    public function index()
    {
        return view('user.settings.index');
    }
}

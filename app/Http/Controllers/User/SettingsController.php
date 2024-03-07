<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;

class SettingsController extends Controller

{
    public function index(HttpRequest $request)
    {
        $user = $request->user();

        return view('user.settings.index', compact('user'));
    }
}

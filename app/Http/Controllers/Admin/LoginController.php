<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(! Auth::guard('admin')->attempt($validated)) {
            return back()->withErrors([
                'email' => 'Не верный логин или пароль',
            ])->onlyInput('email');
        };

        return redirect()->intended('/admin');
    }
}

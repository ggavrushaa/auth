<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->only(['email', 'password',]);

        $remember = (bool) $request->input('remember');
   

        if(! Auth::attempt($data, $remember)) {
            return back()->withErrors([
                'email' => 'Не верный логин или пароль',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->route('login');
    }
}

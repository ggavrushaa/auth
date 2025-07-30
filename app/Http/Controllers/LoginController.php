<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreRequest;
use App\Exceptions\GoogleConfirmationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->only(['email', 'password',]);

        $remember = (bool) $request->input('remember');
   

        if(! Auth::validate($data)) {
            return back()->withErrors([
                'email' => 'Не верный логин или пароль',
            ])->onlyInput('email');
        }

        /** @var \App\Models\User $user */
        $user = Auth::getLastAttempted();

        if($user->googleConfirmationEnabled()) {
            session()->put('login.confirmation.user', $user->id);
            session()->put('login.confirmation.remember', $remember);

            return to_route('login.confirmation');
        }

        Auth::login($user, $remember);

        $request->session()->regenerate();
        return redirect()->intended('/user');
    }

    public function confirm(Request $request)
    {
        $request->validate(['code' => 'required|string|digits:6']);

        /** @var \App\Models\User $user */
        $user = User::query()->findOrFail(session('login.confirmation.user'));

        try {
            $user->checkGoogleConfirmation($request->input('code'));
        } catch (GoogleConfirmationException $th) {
            return back()->withErrors(['code' => $th->getMessage()])->withInput();
        }

        Auth::login($user, session('login.confirmation.remember'));

        $request->session()->regenerate();
        return redirect()->intended('/user');
    }
}

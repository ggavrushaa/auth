<?php

namespace App\Http\Controllers;

use App\Enums\Logins\LoginStatusEnum;
use App\Http\Requests\Login\StoreRequest;
use App\Exceptions\GoogleConfirmationException;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->only(['email', 'password',]);
   
        $success = Auth::validate($data);

        /** @var \App\Models\User $user */
        $user = Auth::getLastAttempted();

        $login = new Login();
        $login->user_id = $user?->id;
        $login->email = $request->input('email');
        $login->remember = $request->boolean('remember');
        $login->agent = $request->userAgent();
        $login->ip = $request->ip();

        if(! $success) {
            $login->status = LoginStatusEnum::failed;
            $login->save();

            return back()->withErrors([
                'email' => 'Не верный логин или пароль',
            ])->onlyInput('email');
        }

        if($user->googleConfirmationEnabled()) {
           $login->status = LoginStatusEnum::confirmation;
           $login->save();

            return to_route('login.confirmation', $login->uuid);
        }

        $login->status = LoginStatusEnum::success;
        $login->save();

        Auth::login($user, $login->remember);

        $request->session()->regenerate();
        return redirect()->intended('/user');
    }

    public function confirmation(Login $login)
    {
        abort_unless($login->status->is(LoginStatusEnum::confirmation), 404);

        return view('login.confirmation', compact('login'));
    }

    public function confirm(Request $request, Login $login)
    {
        abort_unless($login->status->is(LoginStatusEnum::confirmation), 404);

        $request->validate(['code' => 'required|string|digits:6']);

        try {
            $login->user->checkGoogleConfirmation($request->input('code'));
        } catch (GoogleConfirmationException $th) {
            return back()->withErrors(['code' => $th->getMessage()])->withInput();
        }

        $login->status = LoginStatusEnum::success;
        $login->save();

        Auth::login($login->user, $login->remember);

        $request->session()->regenerate();
        return redirect()->intended('/user');
    }
}

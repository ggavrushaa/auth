<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Exceptions\GoogleConfirmationException;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        return view('user.settings.google.index');
    }

    public function enable(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        abort_if($user->googleConfirmationEnabled(), 403, 'Двухфакторная аутентификация уже включена');

        $user->enableGoogleConfirmation();

        session()->put('google_confirmation', true);
        return back();
    }

    public function cancel()
    {
        session()->forget('google_confirmation');
        return back();
    }

    public function confirm(Request $request)
    {
         /** @var \App\Models\User $user */
         $user = $request->user();

         abort_if($user->googleConfirmationEnabled(), 403, 'Двухфакторная аутентификация уже включена');

        $request->validate(['code' => 'required|string|size:6']);

        try {
            $user->confirmGoogleConfirmation($request->input('code'));  
        } catch (GoogleConfirmationException $th) {
            return back()->withErrors(['code' => $th->getMessage()])->withInput();
        }

        session()->forget('google_confirmation');

        return to_route('user.settings');
    }
    public function disable(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        abort_unless($user->googleConfirmationEnabled(), 403, 'Двухфакторная аутентификация не включена');

        $request->validate(['code' => 'required|string|size:6']);

        try {
            $user->disableGoogleConfirmation($request->input('code'));  
        } catch (GoogleConfirmationException $th) {
            return back()->withErrors(['code' => $th->getMessage()])->withInput();
        }

        return to_route('user.settings');
    }
}

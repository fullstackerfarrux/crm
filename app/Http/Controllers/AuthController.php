<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.login');
    }

    public function signin_store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $token = Uuid::uuid4()->toString();

            $expirationTime = Carbon::now()->addMinute(180);

            Session::put('token', $token);
            Session::put('token_expiry', $expirationTime);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided',
        ])->onlyInput('email');
    }
}

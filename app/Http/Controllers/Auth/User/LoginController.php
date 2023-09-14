<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Auth/LogIn');
//     return view('login');
    }

    public function login(Request $request)
    {
        $formFields = $request->only('email','password');
        $remember_me = $request->has('remember_me');

        if (Auth::attempt($formFields,$remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.main'));
        }

        return redirect(route('user.login'))->withErrors([
            'error_auth'=>'Email or password is not correct'
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('main'));
    }
}

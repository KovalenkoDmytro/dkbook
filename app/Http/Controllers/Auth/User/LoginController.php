<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
     return view('login');
    }

    public function login(Request $request)
    {
        $formFields = $request->only('email','password');

//        if (Auth::attempt($formFields)){
//           return redirect(route('dashboard.main'));
//        }

        if (Auth::attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.main'));
        }
        dd(Auth::check());
//        return redirect(route('user.login'))->withErrors([
//            'error'=>'Email or password is not correct'
//        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('main'));
    }
}

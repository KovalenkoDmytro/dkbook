<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() : \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        if(Auth::check()){
            return redirect()->route('dashboard.main');
        }else{
            return redirect()->route('user.login');
        }
//        return view('home');
    }
}

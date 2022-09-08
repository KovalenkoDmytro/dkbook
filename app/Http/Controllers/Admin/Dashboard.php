<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Dashboard extends Controller
{
    function index():View{
        return view('admin.welcome');
    }
}

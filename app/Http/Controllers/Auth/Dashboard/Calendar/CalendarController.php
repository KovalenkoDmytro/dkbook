<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        return view('auth.dashboard.calendar.calendar');
    }
}

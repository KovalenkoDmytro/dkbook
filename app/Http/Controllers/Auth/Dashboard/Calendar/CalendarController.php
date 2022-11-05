<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CalendarController extends DashboardController
{

    public $today = '';

    public function __construct()
    {
        $this->today = Carbon::now();
    }


    public function index(Request $request)
    {
        $userTimezone = Auth::user()->timezone;

        return view('auth.dashboard.calendar.calendar', [
            'today'=>$this->today->timezone($userTimezone)->toDateString()

        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Service;
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
        $current_user_date = $this->today->timezone($userTimezone)->toArray();


        return view('auth.dashboard.calendar.calendar', [
            'today'=>$this->today

        ]);
    }
}

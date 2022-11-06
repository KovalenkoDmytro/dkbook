<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CalendarController extends DashboardController
{

    public $today;
    private $days_of_month;

    public function __construct()
    {
        $this->today = Carbon::now();
        $this->days_of_month = $this->getMonthlyDays();
    }

    private function getMonthlyDays(): array
    {
        $count_days_in_month = $this->today->daysInMonth;
        $days_in_month = [];

        for ($day = 1; $day < $count_days_in_month; $day++){
            $days_in_month[] = Carbon::parse("{$this->today->year}-{$this->today->month}-{$day}");
        }
        return  $days_in_month;
    }



    public function index(Request $request)
    {

        $userTimezone = Auth::user()->timezone;

        return view('auth.dashboard.calendar.calendar', [
            'today'=>$this->today->timezone($userTimezone),
            'monthlyDates' => $this->days_of_month,
        ]);
    }
}

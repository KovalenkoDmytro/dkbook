<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Models\Appointment;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DailyCalendarController extends CalendarController
{
    private array $appointments = [];

    public function index(Request $request)
    {
        $company = Company::getCompany(auth()->id());
        $appointment = new Appointment();

        $userTimezone = Auth::user()->timezone;

        if($request->has('day')){
            $current_day = $request->query('day');
            $current_day = Carbon::parse($current_day);
            $this->appointments = $appointment->getDailyAppointments($company->id, $current_day);
        }else{
            $current_day = $this->today;
        }

        return view('auth.dashboard.calendar.daily_calendar', [
            'yesterday' => $current_day->subDay(1)->toDateString(),
            'today' => $this->today->timezone($userTimezone)->toArray(),
            'current_day' => $current_day,
            'tomorrow' => $current_day->addDay(2)->toDateString(),
            'appointments' => $this->appointments,
        ]);
    }
}

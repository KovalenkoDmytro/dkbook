<?php

namespace App\Http\Controllers\Auth\Calendars;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DailyCalendarController extends CalendarController
{
    private array $appointments = [];
    private object $prev_day;
    private object $next_day;

    public function index(Request $request)
    {

        $appointment = new Appointment();

        $userTimezone = Auth::user()->timezone;

        if ($request->has('day')) {
            $chose_day = $request->query('day');
            $chose_day = Carbon::parse($chose_day);
        } else {
            $chose_day = $this->today;

        }


        $this->appointments = $appointment->getDailyAppointments($chose_day);

        $this->prev_day = Carbon::createFromDate($chose_day->year, $chose_day->month, $chose_day->day - 1);
        $this->next_day = Carbon::createFromDate($chose_day->year, $chose_day->month, $chose_day->day + 1);

        return view('auth.calendar.dailyCalendar', [
            'preview_day' => $this->prev_day,
            'today' => $this->today->timezone($userTimezone),
            'chose_day' => $chose_day,
            'next_day' => $this->next_day,
            'appointments' => $this->appointments,
        ]);
    }
}

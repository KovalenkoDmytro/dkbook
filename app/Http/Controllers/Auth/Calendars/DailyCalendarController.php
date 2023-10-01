<?php

namespace App\Http\Controllers\Auth\Calendars;

use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
use Inertia\Inertia;


class DailyCalendarController extends CalendarController
{
    private array $appointments = [];
    private object $prev_day;
    private object $next_day;

    public function index(Request $request)
    {

        return Inertia::render('Calendar');
//        $appointment = new Appointment();
//
//        $userTimezone = Auth::user()->timezone;
//        $company = Auth::user()->company;
//
//        if ($request->has('day')) {
//            $chose_day = $request->query('day');
//            $chose_day = Carbon::parse($chose_day);
//        } else {
//            $chose_day = $this->today;
//
//        }
//
//
//        $this->appointments = $appointment->getDailyAppointments((int)$company->id, $chose_day);
//
//        $this->prev_day = Carbon::createFromDate($chose_day->year, $chose_day->month, $chose_day->day - 1);
//        $this->next_day = Carbon::createFromDate($chose_day->year, $chose_day->month, $chose_day->day + 1);
//
//
//        $working_time = $company->scheduled->toArray();
//        $day_working_time = $working_time[strtolower($chose_day->englishDayOfWeek)];
//
//
//        preg_match_all('/[0-9]{1,2}:[0-9]{1,2}/', $day_working_time, $day_working_time);
//        $times_start = strtotime($day_working_time[0][0]);
//        $times_end = strtotime($day_working_time[0][1]);
//
//
//        return view('auth.calendar.dailyCalendar', [
//            'preview_day' => $this->prev_day,
//            'today' => $this->today->timezone($userTimezone),
//            'chose_day' => $chose_day,
//            'next_day' => $this->next_day,
//            'appointments' => $this->appointments,
//            'times_start' => (int)date('H', $times_start),
//            'times_end' => (int)date('H', $times_end),
//        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Models\Appointment;
use App\Models\Company;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CalendarController extends DashboardController
{
    public Carbon $today;
    private array $days_of_month;
    private Carbon $chose_month;
    private array $appointments = [];

    public function __construct(Request $request)
    {
        $this->today = Carbon::now();
        $month = new Carbon;
        if ($request->has('month')) {
            $this->chose_month = $month->parse($request->month);;
        } else {
            $this->chose_month = $this->today;
        }
        $this->days_of_month = $this->getMonthlyDays();
    }

    private function getPreviewMonth(): Carbon
    {
        $time = new Carbon;
        return $time->parse($this->chose_month)
            ->clone($this->chose_month)->subMonth();
    }

    private function getNextMonth(): Carbon
    {
        $time = new Carbon;
        return $time->parse($this->chose_month)
            ->clone($this->chose_month)->addMonth();
    }

    private function getMonthlyDays(): array
    {
        $time = new Carbon;
        $count_days_in_month = $time->parse($this->chose_month)->daysInMonth;

        $days_in_month = [];

        for ($day = 1; $day <= $count_days_in_month; $day++) {
            $days_in_month[] = Carbon::parse("{$this->chose_month->year}-{$this->chose_month->month}-{$day}");
        }
        return $days_in_month;
    }

    private function getMonthWeeks()
    {
        $weeks = [];
        foreach ($this->days_of_month as $key => $day) {
            $weeks[$day->weekNumberInMonth][] = [
                'day' =>$day,
                'appointments' => $this->createAppointments($day)
            ] ;
        }
        return $weeks;
    }


    private function createAppointments($booked_day): array
    {
        return array_filter($this->appointments,function($element) use ($booked_day) {
            $date =  Carbon::parse($element['date']);
            if($date->toDateString() === $booked_day->toDateString() ){
                return $booked_day;
            }

        });
    }

    public function index(Request $request)
    {
        $userTimezone = Auth::user()->timezone;
        $appointments = new Appointment();
        $company = Company::getCompany(Auth::user()->companies()->orderBy('id')->first()->id);

        $this->appointments = $appointments->getMonthlyAppointments($company->id, $this->chose_month);

        return view('auth.dashboard.calendar.calendar', [
            'prevMonth' => $this->getPreviewMonth(),
            'choseMonth' => $this->chose_month,
            'nextMonth' => $this->getNextMonth(),
            'today' => $this->today->timezone($userTimezone),
            'appointments'=> $this->appointments,
            'weeks'=> $this->getMonthWeeks(),
        ]);
    }
}

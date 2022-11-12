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

    private function createMonthlyCalendar()
    {
        //creat weeks
        $weeks = [];
        foreach ($this->days_of_month as $day) {
            $weeks[$day->weekNumberInMonth][] = $day;
        }

        $first_week = array_map(function ($day) {
            return $day->dayOfWeekIso;
        }, $weeks[1]);


        $html = '<div class="calendar"> ';

        //create name days of week
        $days = '<div class="days">';
        $period = CarbonPeriod::create('2022-11-07', '2022-11-13');
        foreach ($period->toArray() as $day) {
            $days .= "<p class='day'>{$day->locale(config('global.user.location'))->shortDayName} </p>";
        }
        $days .= '</div>';

        $html .= $days;


        for ($week = 1; $week <= count($weeks); $week++) {
            $html .= '<div class="week"> ';

            $first_week_html = '';
            $other_week_html = '';
            // create first week
            if ($week === 1) {
                for ($day = 1; $day <= 7; $day++) {
                    $day_index = array_search($day, $first_week);
                    if ($day_index || $day_index === 0) {
                        if(($weeks[$week][$day_index]->day === $this->today->day) &&
                            ($this->chose_month->month === $this->today->month) &&
                            ($this->chose_month->year === $this->today->year)
                        ) {
                            $first_week_html .= "<a class='day today' href='/calendar/day?day={$weeks[$week][$day_index]->format("Y-m-d")}'><p class='date'>{$weeks[$week][$day_index]->day}</p><div class='appointments'>{$this->createAppointments($weeks[$week][$day_index]->toDateString())}</div></a>";
                        } else {
                            $first_week_html .= "<a class='day' href='/calendar/day?day={$weeks[$week][$day_index]->format("Y-m-d")}'><p class='date'>{$weeks[$week][$day_index]->day}</p><div class='appointments'>{$this->createAppointments($weeks[$week][$day_index]->toDateString())}</div></a>";
                        }
                    } else {
                        $first_week_html .= "<p class='day _other'></p>";
                    }
                }
                $html .= $first_week_html;
            } else {
                for ($day = 0; $day < 7; $day++) {
                    if (isset($weeks[$week][$day])) {
                        if (($weeks[$week][$day]->day === $this->today->day) &&
                            ($this->chose_month->month === $this->today->month)&&
                            ($this->chose_month->year === $this->today->year)
                        ) {
                            $other_week_html .= "<a class='day today' href='/calendar/day?day={$weeks[$week][$day]->format("Y-m-d")}'><p class='date'>{$weeks[$week][$day]->day}</p><div class='appointments'>{$this->createAppointments($weeks[$week][$day]->toDateString())}</div></a>";
                        } else {
                            $other_week_html .= "<a class='day' href='/calendar/day?day={$weeks[$week][$day]->format("Y-m-d")}'><p class='date'>{$weeks[$week][$day]->day}</p><div class='appointments'>{$this->createAppointments($weeks[$week][$day]->toDateString())}</div></a>";
                        }
                    } else {
                        $other_week_html .= "<p class='day _other'></p>";
                    }
                }
                $html .= $other_week_html;
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
//        return $weeks;
    }

    private function createAppointments($day){

        $day_appointments = array_filter($this->appointments,function($element) use ($day) {
            $date =  Carbon::parse($element['date']);
            if($date->toDateString() === $day ){
                return $day;
            }
        });


        $count = count($day_appointments);

        if ($count>0){
            return "<i class='icon icon_client'></i><p>({$count})</p>";
        }

//        $html = '';
//        foreach ($day_appointments as $appointment){
//            $html.= "<p class='appointment'></p>";
//        }
//        return $html;
    }

    public function index(Request $request)
    {
        $userTimezone = Auth::user()->timezone;
        $appointments = new Appointment();
        $company = Company::getCompany(auth()->id());

        $this->appointments = $appointments->getMonthlyAppointments($company->id, $this->chose_month);

        return view('auth.dashboard.calendar.calendar', [
            'prevMonth' => $this->getPreviewMonth(),
            'choseMonth' => $this->chose_month,
            'nextMonth' => $this->getNextMonth(),
            'today' => $this->today->timezone($userTimezone),
            'calendar' => $this->createMonthlyCalendar(),
            'appointments'=> $this->appointments
        ]);
    }
}

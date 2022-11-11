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
    private $chose_month;

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

//    private function getCurrentMonth(){
//        return $this->today->month;
//    }
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

    private function createMonthlyCalendar(): string
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
                            ($this->chose_month->month === $this->today->month)
                        ) {
                            $first_week_html .= "<a class='day today' href='/calendar/day?day={$weeks[$week][$day_index]->format("Y-m-d")}'>{$weeks[$week][$day_index]->day}</a>";
                        } else {
                            $first_week_html .= "<a class='day' href='/calendar/day?day={$weeks[$week][$day_index]->format("Y-m-d")}'>{$weeks[$week][$day_index]->day}</a>";
                        }
                    } else {
                        $first_week_html .= "<p class='day'>Empty</p>";
                    }
                }
                $html .= $first_week_html;
            } else {
                for ($day = 0; $day < 7; $day++) {
                    if (isset($weeks[$week][$day])) {
                        if (($weeks[$week][$day]->day === $this->today->day) &&
                            ($this->chose_month->month === $this->today->month)
                        ) {
                            $other_week_html .= "<a class='day today' href='/calendar/day?day={$weeks[$week][$day]->format("Y-m-d")}'>{$weeks[$week][$day]->day}</a>";
                        } else {
                            $other_week_html .= "<a class='day' href='/calendar/day?day={$weeks[$week][$day]->format("Y-m-d")}'>{$weeks[$week][$day]->day}</a>";
                        }
                    } else {
                        $other_week_html .= "<p class='day'>Empty</p>";
                    }
                }
                $html .= $other_week_html;
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }


    public function index(Request $request)
    {


        $userTimezone = Auth::user()->timezone;

        return view('auth.dashboard.calendar.calendar', [
            'prevMonth' => $this->getPreviewMonth(),
            'choseMonth' => $this->chose_month,
            'nextMonth' => $this->getNextMonth(),

            'today' => $this->today->timezone($userTimezone),
            'calendar' => $this->createMonthlyCalendar(),
        ]);
    }


}

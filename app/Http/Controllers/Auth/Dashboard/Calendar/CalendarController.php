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

        for ($day = 1; $day <= $count_days_in_month; $day++) {
            $days_in_month[] = Carbon::parse("{$this->today->year}-{$this->today->month}-{$day}");
        }
        return $days_in_month;
    }


    private function createMonthlyCalendar()
    {

        $weeks = [];
        foreach ($this->days_of_month as $day) {
            $weeks[$day->weekNumberInMonth][] = $day;
        }

        $first_week = array_map(function ($day) {
            return $day->dayOfWeekIso;
        }, $weeks[1]);

        $html = '<div class="weeks"> ';

        for ($week = 1; $week <= count($weeks); $week++) {
            $html .= '<div class="week"> ';

            $first_week_html = '';
            $other_week_html = '';
            // create first week
            if ($week === 1) {
                for ($day = 1; $day <= 7; $day++) {
                    $day_index = array_search($day, $first_week);
                    if ($day_index || $day_index === 0) {
                        if ($weeks[$week][$day_index]->day === $this->today->day) {
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
                        if ($weeks[$week][$day]->day === $this->today->day) {
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
        $this->createMonthlyCalendar();
        return view('auth.dashboard.calendar.calendar', [
            'today' => $this->today->timezone($userTimezone),
            'monthlyDates' => $this->days_of_month,
            'calendar' => $this->createMonthlyCalendar(),
        ]);
    }


}

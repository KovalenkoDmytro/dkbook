<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class CreateDailyAppointmentController
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    /**
//     * Get the view / contents that represent the component.
//     *
//     * @return \Illuminate\Contracts\View\View|\Closure|string
//     */
    public function index(Request $request, $date)
    {
        return view('components.create-daily-appointment-controller',[
            'chose_date' => Carbon::parse($date)
        ]);
    }
}

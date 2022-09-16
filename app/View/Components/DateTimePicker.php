<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateTimePicker extends Component
{
    private array $daysOfWeek = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday","sunday"];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.date-time-picker',[
            'schedule_days'=> $this->daysOfWeek
        ]);
    }
}

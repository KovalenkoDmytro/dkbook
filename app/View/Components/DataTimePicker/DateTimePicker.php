<?php

namespace App\View\Components\DataTimePicker;

use App\Models\Company;
use App\Models\CompanySchedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;


class DateTimePicker extends Component
{
    private array $daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday"];
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
     * @return int[]
     */

    public function create(Request $request){

        CompanySchedule::create([
            'monday' => ($request->input('Monday') != null) ? $request->input('Monday') : 'day off',
            'tuesday'=> ($request->input('Tuesday') != null)? $request->input('Tuesday') : 'day off',
            'wednesday' => ($request->input('Wednesday') != null)? $request->input('Wednesday') : 'day off',
            'thursday'=>($request->input('Thursday') != null)? $request->input('Thursday')  : 'day off',
            'friday'=>($request->input('Friday') != null)? $request->input('Friday')  : 'day off',
            'saturday'=>($request->input('Saturday') != null)? $request->input('Saturday')  : 'day off',
            'sunday'=>($request->input('Sunday') != null)? $request->input('Sunday') : 'day off'
        ]);

//        return [
//            'status_code' => 200,
//        ];
    }

    public function render()
    {
        return view('components.date-time-picker',[
            'schedule_days'=> $this->daysOfWeek
        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth\Schedules\EmployeeScheduled;

use App\Http\Controllers\Auth\Schedules\HomeScheduledController;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;

class CreateEmployeeScheduled extends HomeScheduledController
{
    public function store(Request $request, $id){

        $new_scheduled = $this->createScheduled($request);
        $scheduled = EmployeeSchedule::create($new_scheduled);

        dd($scheduled->id);
        $id_addedSchedule = EmployeeSchedule::latest('id')->first()->id;
        Employee::find($id)->update(['employee_schedule_id'=>$id_addedSchedule]);

        return redirect(getRedirect());
    }
}

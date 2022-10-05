<?php

namespace App\Http\Controllers\Auth\Scheduled\EmployeeScheduled;

use App\Http\Controllers\Auth\Scheduled\HomeScheduledController;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;

class CreateEmployeeScheduled extends HomeScheduledController
{
    public function store(Request $request){
        $id = $request->id;
        $createdScheduled = $this->createScheduled($request);

        EmployeeSchedule::create($createdScheduled);
        $id_addedSchedule = EmployeeSchedule::latest('id')->first()->id;
        Employee::find($id)->update(['employee_schedule_id'=>$id_addedSchedule]);

        return redirect(getRedirect());
    }
}

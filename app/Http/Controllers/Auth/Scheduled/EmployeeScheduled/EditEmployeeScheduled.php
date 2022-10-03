<?php

namespace App\Http\Controllers\Auth\Scheduled\EmployeeScheduled;

use App\Http\Controllers\Auth\Scheduled\EditScheduledController;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;

class EditEmployeeScheduled extends EditScheduledController
{
    public function index($id){
        $employee = Employee::getEmployee($id);
        $scheduled = EmployeeSchedule::find($employee['employee_schedule_id'])->only('monday','tuesday','wednesday','thursday','friday','saturday','sunday');

        return view('auth.scheduledEmployee.edit',[
            'employee'=>$employee,
            'scheduled' => $scheduled,
        ]);
    }

    public function update(Request $request){
        $createdScheduled = $this->getCreatedScheduled($request);
         EmployeeSchedule::find($request->schedule_id)->update($createdScheduled);

//        return redirect(route('company.step6'));
        //todo exchange redirect
    }
}

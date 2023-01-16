<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeScheduledController extends HomeScheduledController
{
    public function edit($id)
    {
        $employee = Auth::user()->company->getEmployee((int)$id);
        $scheduled_id = $employee->scheduled->id;
        $scheduled = $this->createScheduled($employee->scheduled);
        return view('auth.scheduledEmployee.edit', compact(['scheduled', 'employee', 'scheduled_id']));
    }

    public function update(Request $request, $id)
    {
        $scheduled = EmployeeSchedule::find((int)$id);
        $new_scheduled = $this->createScheduledFromArray($request->all());

        try {
            $scheduled->update($new_scheduled);
            return redirect()->back()->with('success', __('scheduled has been updated'));
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

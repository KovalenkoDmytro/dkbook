<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeScheduledController extends HomeScheduledController
{
    public function show ($id)
    {
        $employee = Auth::user()->company->getEmployee((int)$id);
        $scheduled_id = $employee->scheduled->id;
        $scheduled= $this->createScheduled($employee->scheduled);
        return view('auth.scheduledEmployee.show', compact(['scheduled','employee','scheduled_id']));
    }

    public function update ()
    {
        try {
            return redirect()->route('')->with('success', __('scheduled has been updated'));
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

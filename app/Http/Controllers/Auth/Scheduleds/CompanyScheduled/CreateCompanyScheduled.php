<?php

namespace App\Http\Controllers\Auth\Scheduleds\CompanyScheduled;

use App\Http\Controllers\Auth\Scheduleds\HomeScheduledController;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanySchedule;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;

class CreateCompanyScheduled extends HomeScheduledController
{
    public function store(Request $request){
        $id = $request->id;
        $createdScheduled = $this->createScheduled($request);

        CompanySchedule::create($createdScheduled);
        $id_addedSchedule = CompanySchedule::latest('id')->first()->id;
        Company::find($id)->update(['company_schedule_id'=>$id_addedSchedule]);

        return redirect(getRedirect());
    }
}

<?php

namespace App\Http\Controllers\Auth\Scheduled\CompanyScheduled;

use App\Http\Controllers\Auth\Scheduled\EditScheduledController;
use App\Models\CompanySchedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditCompanyScheduled extends EditScheduledController
{
    public function index($scheduled_id):View
    {
        $scheduled = CompanySchedule::getScheduled($scheduled_id);
        return view('auth.scheduledCompany.edit',[
            'id'=>$scheduled_id,
            'scheduled' => $scheduled,
        ]);
    }

    public function update(Request $request){
        $createdScheduled = $this->getCreatedScheduled($request);
        CompanySchedule::find($request->scheduled_id)->update($createdScheduled);

        return redirect(route('company.step6'));
    }
}

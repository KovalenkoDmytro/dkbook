<?php

namespace App\Http\Controllers\Auth\Scheduled\CompanyScheduled;

use App\Http\Controllers\Controller;
use App\Models\CompanySchedule;
use Illuminate\View\View;

class EditCompanyScheduled extends Controller
{
    public function index($scheduled_id):View
    {

        $scheduled = CompanySchedule::getScheduled($scheduled_id);
        return view('auth.scheduledCompany.edit',[
            'id'=>$scheduled_id,
            'scheduled' => $scheduled,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth\Dashboard\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointment;
use App\Models\CompanyOwner;
use App\Models\Employee;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{

    public function index(Request $request, $date)
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();
        $chose_date = Carbon::parse($date);

        $minutes = CarbonInterval::minutes(5)->toPeriod('01:00', '01:59');


        return view('components.create-daily-appointment-controller',[
            'chose_date' => $chose_date,
            'owner'=>$owner,
            'minutes_range'=>$minutes
        ]);
    }

    public function store(CreateAppointment $request){

        $data = $request->validated();
    }


}

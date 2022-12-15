<?php

namespace App\Http\Controllers\Auth\Dashboard\Appointment;

use App\Http\Controllers\Controller;
use App\Models\CompanyOwner;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index(Request $request, $date)
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();
        $chose_date = Carbon::parse($date);

        return view('components.create-daily-appointment-controller',[
            'chose_date' => $chose_date,
            'owner'=>$owner
        ]);
    }

    public function store(Request $request){
        $chose_time = $request->all();

    }

}

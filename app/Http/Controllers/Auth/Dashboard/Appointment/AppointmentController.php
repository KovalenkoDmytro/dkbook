<?php

namespace App\Http\Controllers\Auth\Dashboard\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index(Request $request, $date)
    {
        $test = new Employee();
        $test->getAvailableEmployees($date);

        $chose_date = Carbon::parse($date);
//        $available_employees = $test->getAvailableEmployees($chose_date);
        return view('components.create-daily-appointment-controller',[
            'chose_date' => $chose_date,
//            'available_employees' =>$available_employees
        ]);
    }

    public function store(Request $request){
        $chose_time = $request->all();

    }

}

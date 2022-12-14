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
        $test->getAvailableEmployees($date, 2);

        $chose_date = Carbon::parse($date);

        return view('components.create-daily-appointment-controller',[
            'chose_date' => $chose_date,
        ]);
    }

    public function store(Request $request){
        $chose_time = $request->all();

    }

}

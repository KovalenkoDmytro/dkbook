<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index( Request $request)
    {
        $company = Auth::user()->company;
        $appointments_all = $company->appointments;
        $appointment_model = new Appointment();
        $appointments_today = $appointment_model->getDailyAppointments((int)$company->id,now());

        return view('auth.dashboard.main', [
            'appointments_all' => $appointments_all,
            'appointments_today'=>$appointments_today,
        ]);
    }
}

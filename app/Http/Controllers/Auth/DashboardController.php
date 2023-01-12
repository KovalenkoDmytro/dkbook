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
        $appointments_all = Auth::user()->company->appointments;
        $appointment_model = new Appointment();
        $appointments_today = $appointment_model->getDailyAppointments(now());

        return view('auth.dashboard.main', [
            'appointments_all' => count($appointments_all),
            'appointments_today'=>count($appointments_today),
        ]);
    }
}

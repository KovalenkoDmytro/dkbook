<?php

namespace App\Http\Controllers\Auth\Dashboard\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $chose_time = $request->all();

    }
}

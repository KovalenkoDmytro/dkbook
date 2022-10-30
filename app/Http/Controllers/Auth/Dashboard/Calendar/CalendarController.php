<?php

namespace App\Http\Controllers\Auth\Dashboard\Calendar;

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends DashboardController
{
    public function getCompanyAppointments(){
        $company = Company::getCompany(auth()->id());
        return Appointment::getAppointments($company->id)->all();
    }

    public function getAppointments() :array{
        $appointmentsModel = $this->getCompanyAppointments();
        $appointments = [];
        foreach ($appointmentsModel as $key => $appointment ){
            $appointments[$key]['id'] = $appointment->id;
            $appointments[$key]['client'] = Client::getClient($appointment->client_id);
            $appointments[$key]['service'] = Service::all()->where('id', $appointment->service_id)->first();
            if ($appointment->employee_id !== null){
                $appointments[$key]['employee'] = Employee::all()->where('id', $appointment->employee_id)->first();
            }else{
                $appointments[$key]['employee'] = null;
            }
            $appointments[$key]['date'] = $appointment->date;
            if ($appointment->payed){
                $appointments[$key]['payed'] = true;
            }else{
                $appointments[$key]['payed'] = false;
            }
        }
        return $appointments;
    }

    public function index(){
        return view('auth.dashboard.calendar.calendar', [
            'appointments' => $this->getAppointments(),
        ]);
    }
}

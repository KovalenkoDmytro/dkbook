<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    private function createAppointments_Array($appointments_obj): array
    {
        $appointmentsModel = $appointments_obj;
        $appointments = [];
        foreach ($appointmentsModel as $key => $appointment) {
            $appointments[$key]['id'] = $appointment->id;
            $appointments[$key]['client'] = Client::getClient($appointment->client_id);
            $appointments[$key]['service'] = Service::all()->where('id', $appointment->service_id)->first();
            if ($appointment->employee_id !== null) {
                $appointments[$key]['employee'] = Employee::all()->where('id', $appointment->employee_id)->first();
            } else {
                $appointments[$key]['employee'] = null;
            }
            $appointments[$key]['date'] = $appointment->date;
            if ($appointment->payed) {
                $appointments[$key]['payed'] = true;
            } else {
                $appointments[$key]['payed'] = false;
            }
        }
        return $appointments;
    }


    public function getAllAppointments($company_id): array
    {
        $appointmentsModel = Appointment::where('company_id', $company_id)->get()->all();

        return $this->createAppointments_Array($appointmentsModel);
    }

    public function getDailyAppointments($company_id, $date): array
    {

        $current_date = Carbon::parse($date);

        $appointmentsModel = Appointment::where('company_id', $company_id, $date)
            ->whereYear('date', $current_date->year)
            ->whereMonth('date', $current_date->month)
            ->whereDay('date', $current_date->day)
            ->get()
            ->all();
        return $this->createAppointments_Array($appointmentsModel);
    }
}

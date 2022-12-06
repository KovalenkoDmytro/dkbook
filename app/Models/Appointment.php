<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasFactory;

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function getMonthlyAppointments($date): array
    {
        $company = Auth::user()->company;

        return Appointment::where('company_id', $company->id)
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->get()
            ->all();
    }

    public function getDailyAppointments($date): array
    {
        $company = Auth::user()->company;

        return Appointment::where('company_id', $company->id)
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->whereDay('date', $date->day)
            ->with('company','client','service','employee')
            ->get()
            ->all();


    }
}

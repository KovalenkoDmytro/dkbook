<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public static function getAppointments($company_id){
        return Appointment::where('company_id', $company_id)->get();
    }
}

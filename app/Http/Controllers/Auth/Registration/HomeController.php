<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public $companyOwner_id;

    public static function getStepsName(){
        return [
            1 => 'User',
            2 => 'Company',
            3 => 'Photo',
            4 => 'Services',
            5 => 'Employees',
            6 => 'Scheduled',
            7 => 'Finish'
        ];
    }
}

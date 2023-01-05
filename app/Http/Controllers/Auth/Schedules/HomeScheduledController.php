<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeScheduledController extends Controller
{

    public function createScheduled($scheduledModel):array{

        $scheduled = [
            'monday'=>'00:00 - 00:00',
            'tuesday'=>'00:00 - 00:00',
            'wednesday'=>'00:00 - 00:00',
            'thursday'=>'00:00 - 00:00',
            'friday'=>'00:00 - 00:00',
            'saturday'=>'00:00 - 00:00',
            'sunday'=>'00:00 - 00:00',
        ];

        if(isset($scheduledModel->monday)){
            $scheduled['monday']=$scheduledModel->monday;
        }
        if(isset($scheduledModel->tuesday)){
            $scheduled['tuesday']=$scheduledModel->tuesday;
        }
        if(isset($scheduledModel->wednesday)){
            $scheduled['wednesday']=$scheduledModel->wednesday;
        }
        if(isset($scheduledModel->thursday)){
            $scheduled['thursday']=$scheduledModel->thursday;
        }
        if(isset($scheduledModel->friday)){
            $scheduled['friday']=$scheduledModel->friday;
        }
        if(isset($scheduledModel->saturday)){
            $scheduled['saturday']=$scheduledModel->saturday;
        }
        if(isset($scheduledModel->sunday)){
            $scheduled['sunday']=$scheduledModel->sunday;
        }

        return $scheduled;

    }

}

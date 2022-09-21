<?php

namespace App\Http\Controllers\Auth\Scheduled;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeScheduledController extends Controller
{
    public function createScheduled(object $request):array{

        $scheduled = [
            'monday'=>'00:00 - 00:00',
            'tuesday'=>'00:00 - 00:00',
            'wednesday'=>'00:00 - 00:00',
            'thursday'=>'00:00 - 00:00',
            'friday'=>'00:00 - 00:00',
            'saturday'=>'00:00 - 00:00',
            'sunday'=>'00:00 - 00:00',
        ];

        if(!empty($request->input('monday'))){
            $scheduled['monday']=$request->input('monday_from').' - '.$request->input('monday_to');
        }
        if(!empty($request->input('tuesday'))){
            $scheduled['tuesday']=$request->input('tuesday_from').' - '.$request->input('tuesday_to');
        }
        if(!empty($request->input('wednesday'))){
            $scheduled['wednesday']=$request->input('wednesday_from').' - '.$request->input('wednesday_to');
        }
        if(!empty($request->input('thursday'))){
            $scheduled['thursday']=$request->input('thursday_from').' - '.$request->input('thursday_to');
        }
        if(!empty($request->input('friday'))){
            $scheduled['friday']=$request->input('friday_from').' - '.$request->input('friday_to');
        }
        if(!empty($request->input('saturday'))){
            $scheduled['saturday']=$request->input('saturday_from').' - '.$request->input('saturday_to');
        }
        if(!empty($request->input('sunday'))){
            $scheduled['sunday']=$request->input('sunday_from').' - '.$request->input('sunday_to');
        }
        return $scheduled;

    }
}

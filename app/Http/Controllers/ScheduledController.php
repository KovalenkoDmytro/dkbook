<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanySchedule;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class ScheduledController extends Controller
{
    public function index($id, $table):View
    {
        return view('auth.create_scheduled',[
            'id'=>$id,
            'table'=>$table,
        ]);
    }
    public function store(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $id = $request->id;
        $date = [
            'monday'=>'day off',
            'tuesday'=>'day off',
            'wednesday'=>'day off',
            'thursday'=>'day off',
            'friday'=>'day off',
            'saturday'=>'day off',
            'sunday'=>'day off',
        ];

        if(!empty($request->input('monday'))){
            $date['monday']=$request->input('monday_from').' - '.$request->input('monday_from');
        }
        if(!empty($request->input('tuesday'))){
            $date['tuesday']=$request->input('tuesday_from').' - '.$request->input('tuesday_to');
        }
        if(!empty($request->input('wednesday'))){
            $date['wednesday']=$request->input('wednesday_from').' - '.$request->input('wednesday_to');
        }
        if(!empty($request->input('thursday'))){
            $date['thursday']=$request->input('thursday_from').' - '.$request->input('thursday_to');
        }
        if(!empty($request->input('friday'))){
            $date['friday']=$request->input('friday_from').' - '.$request->input('friday_to');
        }
        if(!empty($request->input('saturday'))){
            $date['saturday']=$request->input('saturday_from').' - '.$request->input('saturday_to');
        }
        if(!empty($request->input('sunday'))){
            $date['sunday']=$request->input('sunday_from').' - '.$request->input('sunday_to');
        }

        switch ($request->input('table')) {
            case 'employees':
                EmployeeSchedule::create($date);
                $id_addedSchedule = EmployeeSchedule::latest('id')->first()->id;
                Employee::find($id)->update(['employee_schedule_id'=>$id_addedSchedule]);
                break;
            case 'companies':
                CompanySchedule::create($date);
                $id_addedSchedule = CompanySchedule::latest('id')->first()->id;
                Company::find($id)->update(['company_schedule_id'=>$id_addedSchedule]);
                break;
        }
        return redirect(route('company.step6'));
    }

    public function update($id, $table){

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduledController extends Controller
{
    public function index($id, $name)
    {

        return view('auth.create_scheduled',[
            'employee_id'=>$id,
            'employee_name'=>$name,
        ]);
    }
    public function store(Request $request)
    {

//        return redirect(route('company.step5'));
    }
}

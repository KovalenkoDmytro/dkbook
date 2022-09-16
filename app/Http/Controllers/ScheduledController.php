<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduledController extends Controller
{
    public function index($id, $name)
    {

        return view('auth.create_scheduled',[
            'id'=>$id,
            'name'=>$name,
        ]);
    }
    public function store(Request $request)
    {

//        return redirect(route('company.step5'));
    }
}

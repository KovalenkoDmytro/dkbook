<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('auth.create_employee');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'string|required',
            'email'=>'string',
            'position'=>'string|required',
            'phone'=>'string',
        ]);

        $data['company_id']= session()->get('company_id');
        $data['employee_schedule_id']= 1;


       Employee::create($data);
        return redirect(route('company.step5'));
    }
}

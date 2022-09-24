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
            'name'=>['required','string','max:25'],
            'email'=>['required','email','string','max:50'],
            'position'=>['required','string','max:15'],
            'phone'=>['required','string','max:15'],
        ]);

        $data['company_id']= session()->get('company_id');
        $data['employee_schedule_id']= 1;

       Employee::create($data);
        return redirect(route('company.step5'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.create_employee');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:25'],
            'email' => ['required',
                Rule::unique('employees')->whereNull('deleted_at'),
                'email',
                'string',
                'max:50'],
            'position' => [
                'required',
                'string',
                'max:15'],
            'phone' => [
                'required',
                Rule::unique('employees')->whereNull('deleted_at'),
                'string',
                'max:15'],
        ]);

        $data['company_id'] = session()->get('company_id');
        $data['employee_schedule_id'] = 1;

        Employee::create($data);
        return redirect(route('company.step5'));
        //todo exchange redirect

    }


    public function show(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


        $company = Company::getCompany(Auth::user()->companies()->orderBy('id')->first()->id);

        $employees = Employee::getCompanyEmployees($company->id);

        return view('auth.dashboard.employers.index',[
            'employees' => $employees
        ]);
    }

}

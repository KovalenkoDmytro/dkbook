<?php

namespace App\Http\Controllers;

use App\Models\CompanyOwner;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class EmployeeController extends Controller
{

    public function index()
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();

        return view('auth.employee.index', [
            'employees'=>$owner->company->employees->paginate(3),
        ]);
    }

    public function create(){
        return view('auth.employee.create');
    }

    public function store(Request $request){

    }

    public function show(Request $request, $id){

        $employee = Auth::user()->company->getEmployee((int)$id);

        return view('auth.employee.show', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id){

    }

    public function destroy(Request $request, $id){
        dump($id);


//        redirect()->back()

    }


//    public function index()
//    {
//        return view('auth.create_employee');
//    }

//    public function create(){
//        return view('auth.dashboard.employees.create');
//    }

//    public function store(Request $request)
//    {
//        $data = $request->validate([
//            'name' => [
//                'required',
//                'string',
//                'max:25'],
//            'email' => ['required',
//                Rule::unique('employees')->whereNull('deleted_at'),
//                'email',
//                'string',
//                'max:50'],
//            'position' => [
//                'required',
//                'string',
//                'max:15'],
//            'phone' => [
//                'required',
//                Rule::unique('employees')->whereNull('deleted_at'),
//                'string',
//                'max:15'],
//        ]);
//
//        $data['company_id'] = session()->get('company_id');
//        $data['employee_schedule_id'] = 1;
//
//        Employee::create($data);
//        return redirect(route('company.step5'));
//        //todo exchange redirect
//
//    }


//    public function show(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
//    {
//
//        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
//            ->where('id', \auth()->id())
//            ->first();
//
//        return view('auth.dashboard.employees.index',[
//            'employees'=>$owner->company->employees->paginate(3),
//        ]);
//    }

    public function getAvailableEmployee(Request $request): \Illuminate\Http\JsonResponse
    {

        $date = $request->get('date');
        $service_id = (int)$request->get('service_id');

        $employee = new Employee();
        $available_employees = $employee-> getAvailableEmployees($date, $service_id);

        return response()->json([
            'time'=>$date,
            'employees'=>$available_employees
        ]);

    }
}

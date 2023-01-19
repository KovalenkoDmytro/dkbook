<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Auth\Schedules\EmployeeScheduledController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\CompanyOwner;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{

    public function index()
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();

        return view('auth.employee.index', [
            'employees' => $owner->company->employees->paginate(3),
        ]);
    }

    public function create()
    {
        $services = Auth::user()->company->services;
        return view('auth.employee.create', compact('services'));
    }

    public function store(CreateEmployeeRequest $request)
    {
        $company = Auth::user()->company;
        $new_employee = $request->validated();
        $scheduled = new EmployeeScheduledController;
        $scheduled_array = $scheduled->createScheduled();
        $new_scheduled = EmployeeSchedule::create($scheduled_array);
        $new_employee['employee_schedule_id'] = $new_scheduled->id;

        try {
            $employee = Employee::firstOrCreate($new_employee);
            $company->employees()->attach($employee->id);

            if ($request->has('services')) {
                $employee->services()->sync($request->get('services'));
            }
            return redirect()->route('employee.index')->with('success', 'employee has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }
    }

    public function edit(Request $request, $id)
    {
        $services = Auth::user()->company->services;
        $employee = Auth::user()->company->getEmployee((int)$id);
        $employee_scheduled = $employee->scheduled;
        return view('auth.employee.edit', compact(['employee', 'employee_scheduled', 'services']));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->position = $request->input('position');

        if (is_null($request->input('email'))) {
            $employee->email = null;

        } else {
            $employee->email = $request->input('email');
        }

        if (is_null($request->input('phone'))) {
            $employee->phone = null;
        } else {
            $employee->phone = $request->input('phone');
        }

        try {
            $employee->update();
            if ($request->has('services')){
                $employee->services()->sync($request->get('services'));
            }else
                $employee->services()->detach();

            return redirect()->route('employee.index')->with('success', 'employee has been updated');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }

    }

    public function destroy(Request $request, $id)
    {
        $company = Auth::user()->company;
        $employee = Employee::find($id);

        try {
            $employee->services()->detach();
            $company->employees()->detach($employee->id);
            $employee->delete();
            return redirect()->route('employee.index')->with('success', 'employee has been deleted');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }

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
        $available_employees = $employee->getAvailableEmployees($date, $service_id);

        return response()->json([
            'time' => $date,
            'employees' => $available_employees
        ]);

    }
}

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
        try {
            $company = Auth::user()->company;
            $new_employee = $request->validated();
            $scheduled = new EmployeeScheduledController;
            $scheduled_array = $scheduled->createScheduled();
            $new_scheduled = EmployeeSchedule::create($scheduled_array);
            $new_employee['employee_schedule_id'] = $new_scheduled->id;

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

    public function ajaxStore(CreateEmployeeRequest $request){

        try {
            $new_employee = $request->validated();
            $scheduled = new EmployeeScheduledController;
            $scheduled_array = $scheduled->createScheduled();
            $new_scheduled = EmployeeSchedule::create($scheduled_array);
            $new_employee['employee_schedule_id'] = $new_scheduled->id;

            $employee = Employee::create($new_employee);
            Auth::user()->company->employees()->attach($employee->id);
            return response()->json([
                'massage'=> 'employee has been added',
                'employee' =>  collect($employee)->except(['updated_at', 'created_at'])
            ],200);
        } catch (QueryException $exception) {
            return response()->json([
                'massage'=> $exception->errorInfo[2],
            ],400);
        }
    }

    public function edit(Request $id)
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

    public function destroy(Request $id)
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

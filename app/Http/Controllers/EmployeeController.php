<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\Schedules\EmployeeScheduledController;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Interfaces\Services\ICompanyService;
use App\Interfaces\Services\IEmployeeService;
use App\Models\CompanyOwner;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;


class EmployeeController extends Controller
{

    private ICompanyService $companyService;
    private IEmployeeService $employeeService;
    public function __construct(ICompanyService $companyService, IEmployeeService $employeeService)
    {
        $this->companyService = $companyService;
        $this->employeeService = $employeeService;
    }

    public function index(): Response
    {
        return Inertia::render('Employees/Index',['employees' => $this->companyService->getEmployees()]);
    }

    public function create(): Response
    {
        return Inertia::render('Employees/Create',['services' => $this->companyService->getServices()]);
    }

    public function store(CreateEmployeeRequest $request): RedirectResponse
    {
        $result = $this->employeeService->create($request->validated());
        return redirect()->route('client.index')->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }

//    public function ajaxStore(CreateEmployeeRequest $request){
//
//        try {
//            $new_employee = $request->validated();
//            $scheduled = new EmployeeScheduledController;
//            $scheduled_array = $scheduled->createScheduled();
//            $new_scheduled = EmployeeSchedule::create($scheduled_array);
//            $new_employee['employee_schedule_id'] = $new_scheduled->id;
//
//            $employee = Employee::create($new_employee);
//            Auth::user()->company->employees()->attach($employee->id);
//            return response()->json([
//                'massage'=> 'employee has been added',
//                'employee' =>  collect($employee)->except(['updated_at', 'created_at'])
//            ],200);
//        } catch (QueryException $exception) {
//            return response()->json([
//                'massage'=> $exception->errorInfo[2],
//            ],400);
//        }
//    }
//
    public function edit($employeeId): Response
    {
        $employee = $this->employeeService->get($employeeId);
        $services = $this->companyService->getServices();
        return Inertia::render('Employees/Edit',compact(['employee','services']));


//        $services = Auth::user()->company->services;
//        $employee = Auth::user()->company->getEmployee((int)$id);
//        $employee_scheduled = $employee->scheduled;
//        return view('auth.employee.edit', compact(['employee', 'employee_scheduled', 'services']));
    }
//
//    public function update(UpdateEmployeeRequest $request, $id)
//    {
//        $employee = Employee::find($id);
//        $employee->name = $request->input('name');
//        $employee->position = $request->input('position');
//
//        if (is_null($request->input('email'))) {
//            $employee->email = null;
//
//        } else {
//            $employee->email = $request->input('email');
//        }
//
//        if (is_null($request->input('phone'))) {
//            $employee->phone = null;
//        } else {
//            $employee->phone = $request->input('phone');
//        }
//
//        try {
//            $employee->update();
//            if ($request->has('services')){
//                $employee->services()->sync($request->get('services'));
//            }else
//                $employee->services()->detach();
//
//            return redirect()->route('employee.index')->with('success', 'employee has been updated');
//
//        } catch (QueryException $exception) {
//            return redirect()->back()->with('error', $exception->errorInfo[2]);
//
//        }
//
//    }
//
//    public function destroy(Request $id)
//    {
//        $company = Auth::user()->company;
//        $employee = Employee::find($id);
//
//        try {
//            $employee->services()->detach();
//            $company->employees()->detach($employee->id);
//            $employee->delete();
//            return redirect()->route('employee.index')->with('success', 'employee has been deleted');
//
//        } catch (QueryException $exception) {
//            return redirect()->back()->with('error', $exception->errorInfo[2]);
//        }
//
//    }
//    public function getAvailableEmployees($date, $service_id)
//    {
//        $chose_date = \Carbon\Carbon::parse($date);
//        $available_employees = array();
//        $dayOfWeek = strtolower($chose_date->englishDayOfWeek);
//        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services')
//            ->where('id', \auth()->id())
//            ->first();
//
//
//        foreach ($owner->company->employees as $employee) {
//            $time_range = $employee->scheduled->$dayOfWeek;
//            $time_start = trim(substr($time_range, 0, strpos($time_range, '-')));
//            $time_end = trim(substr($time_range, strpos($time_range, '-') + 1));
//            $time_min = Carbon::parse("$chose_date->year-$chose_date->month-$chose_date->day $time_start");
//            $time_max = Carbon::parse("$chose_date->year-$chose_date->month-$chose_date->day $time_end");
//
//            // get all employees who make receive(passed) service
//            foreach ($employee->services as $service){
//                if($service->id === $service_id){
//                    // get all employee who is works at chose time
//                    if ($chose_date->between($time_min, $time_max)) {
//                        $available_employees[] = $employee;
//                    }
//                }
//            }
//        }
//        return $available_employees;
//    }
//    public function getAvailableEmployee(Request $request): \Illuminate\Http\JsonResponse
//    {
//
//        $date = $request->get('date');
//        $service_id = (int)$request->get('service_id');
//
//        $employee = new Employee();
//        $available_employees = $employee->getAvailableEmployees($date, $service_id);
//
//        return response()->json([
//            'time' => $date,
//            'employees' => $available_employees
//        ]);
//
//    }


}

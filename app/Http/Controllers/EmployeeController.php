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
        return Inertia::render('Employees/Index',['employees' => $this->employeeService->getAll()]);
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

    public function edit($employeeId): Response
    {
        $employee = $this->employeeService->get($employeeId);
        $services = $this->companyService->getServices();
        return Inertia::render('Employees/Edit',compact(['employee','services']));
    }

    public function update(UpdateEmployeeRequest $request, $employeeId): RedirectResponse
    {
        $result = $this->employeeService->update($request->all(),$employeeId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }

    public function destroy(int $employeeId): RedirectResponse
    {
        $result = $this->employeeService->delete($employeeId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }
}

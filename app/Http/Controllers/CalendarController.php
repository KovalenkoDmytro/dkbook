<?php

namespace App\Http\Controllers;
use App\Interfaces\Services\IAppointmentService;


use App\Interfaces\Services\ICompanyService;
use App\Interfaces\Services\IServiceService;
use App\Models\Employee;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private IAppointmentService $appointmentService;
    private ICompanyService $companyService;
    public function __construct(IAppointmentService $appointmentService,ICompanyService $companyService)
    {
        $this->appointmentService = $appointmentService;
        $this->companyService = $companyService;
    }
    public function index(): Response
    {
        $services = $this->companyService->getServices();
        $employees = $this->companyService->getEmployees()->toArray()['employees'];;
        return Inertia::render('Calendar', compact(['services','employees']));
    }

    public function ajaxAppointments(Request $request, int $id){
        $appointments = $this->appointmentService->getByTimeRange($id,$request->except('view'),$request->get('view'));
        return response()->json(['appointments'=>$appointments]);
    }
}

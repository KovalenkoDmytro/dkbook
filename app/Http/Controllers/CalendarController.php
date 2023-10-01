<?php

namespace App\Http\Controllers;
use App\Interfaces\Services\IAppointmentService;


use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private IAppointmentService $appointmentService;
    public function __construct(IAppointmentService $appointmentService,)
    {
        $this->appointmentService = $appointmentService;
    }
    public function index(): Response
    {
        return Inertia::render('Calendar');
    }

    public function ajaxAppointments(Request $request, int $id){
        $appointments = $this->appointmentService->getByTimeRange($id,$request->except('view'),$request->get('view'));
        return response()->json(['appointments'=>$appointments]);
    }
}

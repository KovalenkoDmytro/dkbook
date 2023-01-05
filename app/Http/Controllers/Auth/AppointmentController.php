<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointment;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\CompanyOwner;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index(Request $request, $date)
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();
        $chose_date = Carbon::parse($date);

        $minutes = CarbonInterval::minutes(5)->toPeriod('01:00', '01:59');


        return view('components.create-daily-appointment-controller',[
            'chose_date' => $chose_date,
            'owner'=>$owner,
            'minutes_range'=>$minutes
        ]);
    }

    public function store(CreateAppointment $request){

        $data = $request->validated();

        try {
            if(isset($data['client']['id'])){
                Appointment::create([
                        'company_id' => Auth::user()->company->id,
                        'client_id' => (int)$data['client']['id'],
                        'service_id' => (int)$data['service_id'],
                        'employee_id'=> (int)$data['employee_id'],
                        'date'=> $data['booked_date'],
                    ]
                );

            }else{
                $client = Client::create([
                    'name'=>(string)$data['client']['name'],
                    'phone'=>(string)$data['client']['phone'],
                    'email'=>(string)$data['client']['email'],
                ]);

                //add client to piv table
                Auth::user()->company->clients()->attach([$client->id]);

                Appointment::create([
                        'company_id' => Auth::user()->company->id,
                        'client_id' => (int)$client->id,
                        'service_id' => (int)$data['service_id'],
                        'employee_id'=> (int)$data['employee_id'],
                        'date'=> $data['booked_date'],
                    ]
                );
            }
            return redirect()->route('dailyCalendar.index')->with('success', 'appointment has been added');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

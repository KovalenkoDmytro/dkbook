<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('auth.service.index');
    }
    public function create()
    {
        return view('auth.service.create');
    }
    public function store(ServiceRequest $request)
    {
        try {
//            $new_client = $request->validated();
//            $client = Client::firstOrCreate($new_client);
//            $company->clients()->attach($client->id);
//            return redirect()->route('client.index')->with('success', 'client has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }
//        $data = $request->validate([
//            'name' => ['required','string','max:25'],
//            'price'=> ['required','numeric','max:10000'],
//            'timeRange_hour'=>'integer',
//            'timeRange_minutes'=>'integer',
//
//        ]);
//        $data['company_id']= session()->get('company_id');

//        Service::create($data);

//        return redirect(route('company.step4'));
        //todo exchange redirect
//        dd(getCurrentStepRegistration());
    }
    public function edit()
    {
        return view('auth.service.edit');
    }

    public function update(ServiceRequest $request)
    {
        try {
//            $client->update();
//            return redirect()->route('client.index')->with('success', 'client has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }
    }
    public function destroy()
    {
    }
}



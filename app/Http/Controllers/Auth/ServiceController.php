<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Auth::user()->company->services;
        return view('auth.service.index',compact('services'));
    }
    public function create()
    {
        return view('auth.service.create');
    }
    public function store(ServiceRequest $request)
    {
        try {
            $new_service = $request->validated();
            Service::firstOrCreate($new_service);
            return redirect()->route('services.index')->with('success', 'service has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
    public function edit($id)
    {
        $service = Service::find((int)$id);
        return view('auth.service.edit',compact('service'));
    }

    public function update(ServiceRequest $request)
    {
        dd($request->all());
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



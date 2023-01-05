<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClienRequest;
use App\Http\Requests\Client\UpdateClienRequest;
use App\Models\Client;
use App\Models\CompanyOwner;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $owner = CompanyOwner::with('company.employees.scheduled', 'company.employees.services', 'company.clients')
            ->where('id', \auth()->id())
            ->first();
        return view('auth.client.index', [
            'clients' => $owner->company->clients,
        ]);
    }

    public function create()
    {
        return view('auth.client.create');
    }

    public function store(CreateClienRequest $request)
    {
        $company = Auth::user()->company;
        try {
            $new_client = $request->validated();
            $client = Client::firstOrCreate($new_client);
            $company->clients()->attach($client->id);
            return redirect()->route('client.index')->with('success', 'client has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }

    }

    public function show($id)
    {
        $client = Client::find((int)$id);

        return view('auth.client.show', compact(['client']));
    }

    public function update(UpdateClienRequest $request, $id)
    {
        $client = Client::find((int)$id);
        $client->name = $request->input('name');

        if(is_null($request->input('email'))){
            $client->email = null;

        }else{
            $client->email = $request->input('email');
        }

        if(is_null($request->input('phone'))){
            $client->phone = null;
        }else{
            $client->phone = $request->input('phone');
        }


        try {
            $client->update();
            return redirect()->route('client.index')->with('success', 'client has been added');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }
    }

    public function destroy(Request $request, $id)
    {
        dump($id);
    }
}

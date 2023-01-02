<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClienRequest;
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

    public function show(Request $request, $id)
    {
        $client = Client::find((int)$id);

        return view('auth.client.show', compact(['client']));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {
        dump($id);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateClienRequest;
use App\Http\Requests\Client\UpdateClienRequest;
use App\Interfaces\Services\IClientService;
use App\Interfaces\Services\ICompanyService;
use App\Models\Client;
use App\Models\CompanyOwner;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClientController extends Controller
{
    private IClientService $clientService;
    private ICompanyService $companyService;
    public function __construct(IClientService $clientService, ICompanyService $companyService)
    {
        $this->clientService = $clientService;
        $this->companyService = $companyService;
    }
    public function index(): \Inertia\Response
    {
        return Inertia::render('Clients/Index',['clients' => $this->companyService->getClients()]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Clients/Create');
//        return view('auth.client.create');
    }

    public function store(CreateClienRequest $request): \Illuminate\Http\RedirectResponse
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

    public function edit($id)
    {
        $client = Client::find((int)$id);

        return view('auth.client.edit', compact(['client']));
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

    public function destroy( int $clientId): \Illuminate\Http\RedirectResponse
    {
        $result = $this->clientService->delete($clientId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }

}

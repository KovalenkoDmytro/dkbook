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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    private IClientService $clientService;
    private ICompanyService $companyService;
    public function __construct(IClientService $clientService, ICompanyService $companyService)
    {
        $this->clientService = $clientService;
        $this->companyService = $companyService;
    }
    public function index(): Response
    {
        return Inertia::render('Clients/Index',['clients' => $this->companyService->getClients()]);
    }

    public function create(): Response
    {
        return Inertia::render('Clients/Create');
//        return view('auth.client.create');
    }

    public function store(CreateClienRequest $request): RedirectResponse
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

    public function edit(int $clientId): Response
    {
        $client = $this->clientService->get($clientId);
        return Inertia::render('Clients/Edit',['client' => $client]);
    }

    public function update(UpdateClienRequest $request, $id): RedirectResponse
    {
        $result = $this->clientService->update($request->all(),$id);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }

    public function destroy( int $clientId): RedirectResponse
    {
        $result = $this->clientService->delete($clientId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }

}

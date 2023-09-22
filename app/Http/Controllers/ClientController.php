<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClienRequest;
use App\Http\Requests\Client\UpdateClienRequest;
use App\Interfaces\Services\IClientService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    private IClientService $clientService;

    public function __construct(IClientService $clientService)
    {
        $this->clientService = $clientService;
    }
    public function index(): Response
    {
        return Inertia::render('Clients/Index',['clients' => $this->clientService->getAll()]);
    }

    public function create(): Response
    {
        return Inertia::render('Clients/Create');
    }

    public function store(CreateClienRequest $request): RedirectResponse
    {
        $result = $this->clientService->create($request->validated());
        return redirect()->route('client.index')->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
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

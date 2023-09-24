<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Interfaces\Services\IServiceService;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;


class ServiceController extends Controller
{
    private IServiceService $serviceService;
    public function __construct(IServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    public function index(): \Inertia\Response
    {
        return Inertia::render('Services/Index',['services' => $this->serviceService->getAll()]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Services/Create');
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $result = $this->serviceService->create($request->validated());
        return redirect()->route('service.index')->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }
    public function edit($serviceId): Response
    {
        $service = Service::query()->findOrFail($serviceId);
        return Inertia::render('Services/Edit',compact('service'));
    }
    public function update(ServiceRequest $request, $serviceId): RedirectResponse
    {
        $result = $this->serviceService->update($request->all(),$serviceId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }
    public function destroy(int $serviceId): RedirectResponse
    {
        $result = $this->serviceService->delete($serviceId);
        return back()->with(['type' => $result->getType(), 'message' => $result->getMessage()]);
    }
}



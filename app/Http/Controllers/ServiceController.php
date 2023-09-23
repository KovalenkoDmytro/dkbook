<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Interfaces\Services\IServiceService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;


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
//
//    public function ajaxStore(ServiceRequest $request){
//
//        try {
//            $service = $request->validated();
//            $new_service = Service::firstOrCreate($service);
//
//            return response()->json([
//                'massage'=> 'service has been added',
//                'service' =>  collect($new_service)->except(['updated_at', 'created_at'])
//            ],200);
//
//        } catch (QueryException $exception) {
//            return response()->json([
//                'massage'=> $exception->errorInfo[2],
//            ],400);
//        }
//    }
//
//    public function edit($id)
//    {
//        $service = Service::find((int)$id);
//        return view('auth.service.edit', compact('service'));
//    }
//
//    public function update(ServiceRequest $request, $id)
//    {
//        try {
//            $service = Service::find((int)$id);
//            $service_update = $request->validated();
//            $service->update($service_update);
//
//            return redirect()->route('services.edit', [$id])->with('success', 'service has been updated');
//
//        } catch (QueryException $exception) {
//            return redirect()->back()->with('error', $exception->errorInfo[2]);
//
//        }
//    }
//
//    public function destroy()
//    {
//    }
}



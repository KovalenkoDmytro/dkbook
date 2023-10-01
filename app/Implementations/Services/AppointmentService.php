<?php

namespace App\Implementations\Services;

use App\Implementations\Results\ErrorResult;
use App\Implementations\Results\SuccessResult;
use App\Interfaces\Results\IResult;
use App\Interfaces\Services\IAppointmentService;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentService implements IAppointmentService
{
    const PER_PAGE = 10;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function create(array $data): IResult
    {
        dd($data);
//        $service = Arr::add($data, 'company_id', Auth::user()->company->id);
//        try {
//            Appointment::query()->firstOrCreate($data);
//            return new SuccessResult('Employee has been created.');
//        }catch (\Exception $exception) {
//
//            Log::error($exception->getMessage());
//            return new ErrorResult();
//        }
    }

    public function update(array $data , int $appointmentId): IResult
    {
//        try {
//            $client = Service::query()->findOrFail($serviceId);
//            $client->update($data);
//
//            return new SuccessResult('Service has been updated.');
//        } catch (\Exception $exception) {
//
//            Log::error($exception->getMessage());
//            return new ErrorResult();
//        }
    }

    public function delete(int $appointmentId): IResult
    {
//        try {
//            $service = Service::query()->findOrFail($serviceId);
//            $service->employees()->wherePivot('service_id', '=', $serviceId)->detach();
//            $service->delete();
//
//            return new SuccessResult('Client has been deleted.');
//        } catch (\Exception $exception) {
//
//            Log::error($exception->getMessage());
//            return new ErrorResult();
//        }
    }

    public function get(int $appointmentId): Model|Collection|Builder|array|null
    {
//        return Service::query()->findOrFail($serviceId);
    }

    private function prepareAppointmentsArray(Collection $data): array|Collection
    {
        $appointments = [];

        foreach ($data as $appointment) {
            $client = Client::query()->findOrFail($appointment->client_id);
            $employee = Employee::query()->findOrFail($appointment->employee_id);
            $service = Service::query()->findOrFail($appointment->service_id);
            $appointments[] = [
                'event_id' => $appointment->id,
                'start' => Carbon::parse($appointment->date)->format('Y/m/d H:i'),
                'payed' => (bool)$appointment->payed,
                'client' => [
                    'name' => $client->name,
                    'phone' => $client->phone,
                    'email' => $client->email,
                ],
                'employee' => $employee->name,
                'service'=>[
                    'name'=> $service->name,
                ]
            ];
        }
        return $appointments;
    }

    public function getByTimeRange($companyId, $dateRage, $filterView): array|Collection
    {
        $appointments = Appointment::query()
            ->where('company_id', $companyId)
            ->when($filterView === 'day' , function ($q) use ($dateRage) {
                $q->whereDate('date',$dateRage['start']);
            })
            ->when($filterView !== 'day' , function ($q) use ($dateRage) {
                $q->whereBetween('date', [$dateRage['start'], $dateRage['end']]);
            })
            ->get();

        return $this->prepareAppointmentsArray($appointments);
    }

    public function getAll(): array|Collection
    {
        return ([]);
        // TODO: Implement getAll() method.
    }
}

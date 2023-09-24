<?php

namespace App\Implementations\Services;

use App\Implementations\Results\ErrorResult;
use App\Implementations\Results\SuccessResult;
use App\Interfaces\Results\IResult;
use App\Interfaces\Services\IServiceService;
use App\Models\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ServiceService implements IServiceService
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
        $service = Arr::add($data, 'company_id', Auth::user()->company->id);
        try {
            Service::query()->firstOrCreate($service);
            return new SuccessResult('Employee has been created.');
        }catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function update(array $data , int $serviceId): IResult
    {
        try {
            $client = Service::query()->findOrFail($serviceId);
            $client->update($data);

            return new SuccessResult('Service has been updated.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function delete(int $serviceId): IResult
    {
        try {
            $service = Service::query()->findOrFail($serviceId);
            $service->employees()->wherePivot('service_id', '=', $serviceId)->detach();
            $service->delete();

            return new SuccessResult('Client has been deleted.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function get(int $serviceId): Model|Collection|Builder|array|null
    {
        return Service::query()->findOrFail($serviceId);
    }

    public function getAll(): LengthAwarePaginator
    {
        $services = Service::query()->get();
        return $services->paginate(self::PER_PAGE)->onEachSide(2);
    }
}

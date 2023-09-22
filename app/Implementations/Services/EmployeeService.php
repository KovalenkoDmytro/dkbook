<?php

namespace App\Implementations\Services;

use App\Interfaces\Results\IResult;
use App\Interfaces\Services\IEmployeeService;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Implementations\Results\ErrorResult;
use App\Implementations\Results\SuccessResult;

class EmployeeService implements IEmployeeService
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

        $company = Auth::user()->company;
        try {
            $new_employee = Employee::query()->firstOrCreate(Arr::except($data, ['services']));
            $new_employee->services()->sync($data['services']);
            $company->employees()->attach($new_employee->id);
            return new SuccessResult('Employee has been created.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function update(array $data , int $employeeId): IResult
    {
        try {
            $employee = Employee::query()->findOrFail($employeeId);
            $employee->update(Arr::except($data, ['services']));
            $employee->services()->sync($data['services']);

            return new SuccessResult('Employee has been updated.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function delete(int $employeeId): IResult
    {
//        try {
//            $client = Client::query()->findOrFail($clientId);
//            $client->Companies()->wherePivot('client_id', '=', $clientId)->detach();
//            $client->delete();
//
//            return new SuccessResult('Client has been deleted.');
//        } catch (\Exception $exception) {
//
//            Log::error($exception->getMessage());
//            return new ErrorResult();
//        }
    }

    public function get(int $employeeId): Model|Collection|Builder|array|null
    {
        $employee = Employee::query()->findOrFail($employeeId);
        $employee_array = $employee->toArray();
        return Arr::prepend($employee_array, $employee->services()->get()->pluck('id'), 'services');
    }

    public function getAll(): LengthAwarePaginator
    {
//        $employees = (new \App\Models\Client)->Companies();
////        return $clients->paginate(self::PER_PAGE);

    }
}

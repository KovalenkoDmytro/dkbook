<?php

namespace App\Implementations\Services;

use App\Interfaces\Results\IResult;
use App\Interfaces\Services\IClientService;
use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Implementations\Results\ErrorResult;
use App\Implementations\Results\SuccessResult;

class ClientsService implements IClientService
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
            $new_client = Client::query()->firstOrCreate($data);
            $company->clients()->attach($new_client->id);
            return new SuccessResult('Client has been created.');
        }catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function update(array $data , int $clientId): IResult
    {
        try {
            $client = Client::query()->findOrFail($clientId);
            $client->update($data);

            return new SuccessResult('Client has been updated.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function delete(int $clientId): IResult
    {
        try {
            $client = Client::query()->findOrFail($clientId);
            $client->Companies()->wherePivot('client_id', '=', $clientId)->detach();
            $client->delete();

            return new SuccessResult('Client has been deleted.');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            return new ErrorResult();
        }
    }

    public function get(int $clientId): Model|Collection|Builder|array|null
    {
        return Client::query()->findOrFail($clientId);
    }

    public function getAll(): LengthAwarePaginator
    {
        $clients = Client::query()->get();
        return $clients->paginate(self::PER_PAGE)->onEachSide(2);
    }
}

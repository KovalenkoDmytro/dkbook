<?php

namespace App\Implementations\Services;

use App\Interfaces\Results\IResult;
use App\Interfaces\Services\IClientService;
use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    public function getAll(): LengthAwarePaginator
    {
        $clients = (new \App\Models\Client)->Companies();
        return $clients->paginate(self::PER_PAGE);
        // TODO: Implement getAll() method.
    }

    public function delete(int $ClientId): IResult
    {
        try {
            $client = Client::query()->findOrFail($ClientId);
            $client->Companies()->wherePivot('client_id', '=', $ClientId)->detach();
            $client->delete();

            return new SuccessResult('Client has been deleted.', 200);

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            return new ErrorResult('Something went wrong. Please try again.', 400);
        }
    }
}

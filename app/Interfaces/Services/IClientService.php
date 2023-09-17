<?php

namespace App\Interfaces\Services;

use App\Interfaces\Results\IResult;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IClientService
{
    public function get(int $clientId);
    public function update(array $data, int $clientId):IResult;
    public function delete(int $clientId): IResult;
    public function getAll(): LengthAwarePaginator;

}

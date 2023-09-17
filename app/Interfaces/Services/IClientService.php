<?php

namespace App\Interfaces\Services;

use App\Interfaces\Results\IResult;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IClientService
{
    public function delete(int $ClientId): IResult;
    public function getAll(): LengthAwarePaginator;

}

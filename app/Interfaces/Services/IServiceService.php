<?php

namespace App\Interfaces\Services;

use App\Interfaces\Results\IResult;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IServiceService
{
    public function get(int $serviceId);
    public function create(array $data) : IResult;
    public function update(array $data, int $serviceId):IResult;
    public function delete(int $serviceId): IResult;
    public function getAll(): LengthAwarePaginator;

}

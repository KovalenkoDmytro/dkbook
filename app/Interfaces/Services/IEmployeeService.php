<?php

namespace App\Interfaces\Services;

use App\Interfaces\Results\IResult;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IEmployeeService
{
    public function get(int $employeeId);
    public function create(array $data) : IResult;
    public function update(array $data, int $employeeId):IResult;
    public function delete(int $employeeId): IResult;
    public function getAll(): LengthAwarePaginator;

}

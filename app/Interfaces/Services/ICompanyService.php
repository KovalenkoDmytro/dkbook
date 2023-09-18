<?php

namespace App\Interfaces\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ICompanyService
{
    public function getClients();

    public function getEmployees();

}

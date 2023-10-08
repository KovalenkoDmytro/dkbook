<?php

namespace App\Implementations\Services;

use App\Interfaces\Services\ICompanyService;
use App\Models\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CompanyService implements ICompanyService
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

    public function get(int $companyId) {
        return Company::findOrFail($companyId);
    }

    public function getClients()
    {
        $companyId = Auth::user()->company->id;
        return Company::findOrFail($companyId)->clients;
    }

    public function getEmployees()
    {
        $companyId = Auth::user()->company->id;
        return Company::with('employees.services')->findOrFail($companyId);
    }

    public function getServices()
    {
        return Auth::user()->company->services;
    }
}

<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'auth.dashboard.employers.index'
        ],function ($view){
            $view->with(
                [
                    'company_owner' => Auth::user(),
                    'company'=> Auth::user()->company,
                    'employees'=>Employee::getCompanyEmployees(Auth::user()->company->id),
                ]
            );
        });
    }
}

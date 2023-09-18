<?php

namespace App\Providers;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Hotel
        $this->app->when(\App\Http\Controllers\ClientController::class)
            ->needs(\App\Interfaces\Services\IClientService::class)
            ->give(\App\Implementations\Services\ClientsService::class);

        $this->app->bind(
            \App\Interfaces\Services\IClientService::class,
            \App\Implementations\Services\ClientsService::class
        );

        // Clients for company
        $this->app->when(\App\Http\Controllers\CompanyController::class)
            ->needs(\App\Interfaces\Services\ICompanyService::class)
            ->give(\App\Implementations\Services\CompanyService::class);

        $this->app->bind(
            \App\Interfaces\Services\ICompanyService::class,
            \App\Implementations\Services\CompanyService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });


    }
}

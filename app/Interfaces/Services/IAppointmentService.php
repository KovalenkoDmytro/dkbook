<?php

namespace App\Interfaces\Services;

use App\Interfaces\Results\IResult;
use Illuminate\Database\Eloquent\Collection;

interface IAppointmentService
{
    public function get(int $appointmentId);
    public function create(array $data) : IResult;
    public function update(array $data, int $appointmentId):IResult;
    public function delete(int $appointmentId): IResult;
    public function getAll(): array|Collection;
    public function getByTimeRange(int $companyId, array $dateRage, string $filterView): array|Collection;

}

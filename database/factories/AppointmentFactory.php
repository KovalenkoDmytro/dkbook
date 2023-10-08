<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = Carbon::today('America/Vancouver')->addDays(rand(0, 5))->addSeconds(rand(0, 86400));
        return [
            'company_id' => Company::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'service_id' => Service::all()->random()->id,
            'employee_id'=>Employee::all()->random()->id,
            'start'=>$date,
            'end'=>Carbon::parse($date)->addHour(1),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Service;
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
    public function definition()
    {
        return [
            'company_id' => Company::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'service_id' => Service::all()->random()->id,
            'employee_id'=>null,
            'date'=>$this->faker->dateTime,

        ];
    }
}

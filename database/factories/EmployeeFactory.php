<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanySchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_schedule_id'=>CompanySchedule::all()->random()->id,
            'name'=>$this->faker->name,
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'position'=>$this->faker->randomElement(['hairdresser','barber','cosmetologist'])
        ];
    }
}

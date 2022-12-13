<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeSchedule>
 */
class EmployeeScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'monday' => $this->faker->randomElement(['08:00 - 16:00', '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'tuesday' => $this->faker->randomElement(['08:00 - 16:00', '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'wednesday' => $this->faker->randomElement(['08:00 - 16:00', '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'thursday' => $this->faker->randomElement(['08:00 - 16:00', '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'friday' => $this->faker->randomElement(['08:00 - 16:00', '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'saturday' => $this->faker->randomElement([null, '08:00 - 20:00', '11:00 - 19:00', '08:00 - 12:00']),
            'sunday' => $this->faker->randomElement(['08:00 - 10:00', null, '11:00 - 14:00', '08:00 - 12:00']),
        ];
    }
}

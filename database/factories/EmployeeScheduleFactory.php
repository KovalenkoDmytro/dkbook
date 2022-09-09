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
            'monday' => '08:00 - 20:00',
            'tuesday' => '08:00 - 20:00',
            'wednesday' => '08:00 - 20:00',
            'thursday' => '08:00 - 20:00',
            'friday' => '08:00 - 20:00',
            'saturday' => '08:00 - 20:00',
            'sunday' => '08:00 - 20:00',
        ];
    }
}

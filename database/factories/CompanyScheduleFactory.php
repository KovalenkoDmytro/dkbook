<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanySchedule>
 */
class CompanyScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'monday' => fake()->time('H:i'),
            'tuesday' => fake()->time('H:i'),
            'wednesday' => fake()->time('H:i'),
            'thursday' => fake()->time('H:i'),
            'friday' => fake()->time('H:i'),
            'saturday' => fake()->time('H:i'),
            'sunday' => fake()->time('H:i'),
        ];
    }
}

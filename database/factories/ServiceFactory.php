<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'price'=>$this->faker->numberBetween($min = 50, $max = 300),
            'timeRange_hour'=>$this->faker->numberBetween(0,4),
            'timeRange_minutes'=>$this->faker->dateTime()->format('i'),
        ];
    }
}

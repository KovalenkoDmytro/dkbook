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
            'company_id' => Company::all()->random()->id,
            'name'=> $this->faker->company,
            'price'=>$this->faker->numberBetween($min = 50, $max = 300),
            'timeRange_hour'=>$this->faker->dateTime()->format('H'),
            'timeRange_minutes'=>$this->faker->dateTime()->format('i'),
        ];
    }
}

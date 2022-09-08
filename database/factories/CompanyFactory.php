<?php

namespace Database\Factories;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanySchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'business_type_id'=>BusinessType::all()->random()->id,
            'company_schedule_id'=>CompanySchedule::all()->random()->id,
            'name'=>fake()->company,
            'address'=>fake()->address,
            'socialMedia'=>fake()->imageUrl,
        ];
    }
}

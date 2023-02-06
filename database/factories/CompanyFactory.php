<?php

namespace Database\Factories;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanyOwner;
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
            'company_owner_id'=>1,
            'name'=>fake()->company,
            'address'=>fake()->address,
        ];
    }
}

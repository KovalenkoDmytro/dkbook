<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyOwner>
 */
class CompanyOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'login'=>$this->faker->firstName,
            'password'=>Hash::make('Malma2033!'),
            'email'=>'prestigio4040stud@gmail.com',
            'fullName'=>$this->faker->name,
            'phone'=>$this->faker->phoneNumber,
            'timezone'=>'Europe/Warsaw',
        ];
    }
}

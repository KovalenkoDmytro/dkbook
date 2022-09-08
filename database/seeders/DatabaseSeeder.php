<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanySchedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        BusinessType::create(['name' => 'Barber shop']);
        BusinessType::create(['name' => 'Beauty Studio']);
        BusinessType::create(['name' => 'Physiotherapy']);
        BusinessType::create(['name' => 'Hairdresser']);
        BusinessType::create(['name' => 'Massage']);
        BusinessType::create(['name' => 'Aesthetic medicine']);
        BusinessType::create(['name' => 'Natural medicine']);
        BusinessType::create(['name' => 'Automotive']);
        BusinessType::create(['name' => 'Psychotherapy']);
        BusinessType::create(['name' => 'Dentist']);
        BusinessType::create(['name' => 'Tattoo Studio']);
        BusinessType::create(['name' => 'Other']);

        CompanySchedule::factory(2)->create();
        Company::factory(4)->create();
    }
}

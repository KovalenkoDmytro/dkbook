<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use App\Models\BusinessType;
use App\Models\Client;
use App\Models\Company;
use App\Models\CompanySchedule;
use App\Models\EmployeeSchedule;
use App\Models\Service;
use Database\Factories\AppointmentFactory;
use Database\Factories\EmployeeScheduleFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        CompanySchedule::factory(1)->create();
        EmployeeSchedule::factory(1)->create();
        Company::factory(4)->create();

        Client::factory(15)->create();
        Service::factory(15)->create();
        Appointment::factory()
            ->count(50)
            ->state(new Sequence(
                ['payed' => true],
                ['payed' => false]
            ))
            ->create();
    }
}

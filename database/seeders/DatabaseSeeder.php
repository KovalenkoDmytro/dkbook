<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use App\Models\BusinessType;
use App\Models\Client;
use App\Models\Company;
use App\Models\CompanyOwner;
use App\Models\CompanySchedule;
use App\Models\Employee;
use App\Models\EmployeeSchedule;
use App\Models\Service;
use Database\Factories\AppointmentFactory;
use Database\Factories\CompanyOwnerFactory;
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
//
        CompanyOwner::factory(1)->create();
        $clients = Client::factory(1500)->create();



        CompanySchedule::factory(1)->create();
        EmployeeSchedule::factory(4)->create();


        $employees = Employee::factory(1500)->create();

        //        create relationship Client-Company
        Company::factory(1)
            ->create()
            ->each(function ($company) use ($clients) {
            $company->clients()->attach($clients->random(1000));})
            ->each(function ($company) use ($employees) {
                $company->employees()->attach($employees->random(1000));
            });


//        create services

        $names = ['Manicures', 'Pedicures', 'Hair Care', 'Waxing', 'Body Massage','Pre-Bridal Grooming',];
        foreach($names as $name) {
            Service::factory()->create([
                'name' => $name,
            ]);
        }
        //    and    create relationship Service-Employee
        Service::all()
            ->each(function ($service) use ($employees) {
                $service->employees()->attach($employees->random(5));
        });


//        create appointments
        Appointment::factory()
            ->count(2000)
            ->state(new Sequence(
                ['payed' => true],
                ['payed' => false]
            ))
            ->create();
    }
}

<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanyLogo;
use App\Models\CompanyOwner;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CreateController extends HomeController
{
    private int $registrationSteps = 5;


    public function step1(): View
    {
        return view("auth.registration.step1", [
            'steps' => $this->registrationSteps,
            'step' => 1,
        ]);
    }

    public function createOwner(Request $request)
    {
        $data = $request->validate(
            [
                'login' => 'string',
                'password' => 'string',
                'email' => 'string',
                'fullName' => 'string',
                'phone' => 'string',
                'businessMode' => 'string',
            ]
        );
        $data['password'] = Hash::make($request->password);
        CompanyOwner::create($data);

        //todo винести в model
        $company_owner = CompanyOwner::where('login', $request->input('login'))->get();

        session()->put('companyOwner_id', $company_owner[0]->id);

        return redirect(route('company.step2'));
    }


    public function step2(): View
    {

        return view("auth.registration.step2", [
            'steps' => $this->registrationSteps,
            'step' => 2,
            'business_type' => collect(BusinessType::all())->map(function ($type) {
                return [
                    'id' => $type->id,
                    'type' => $type->name
                ];
            }),
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function createCompany(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'string',
                'address' => 'string',
                'socialMedia' => 'string',
                'business_type_id'=>'integer'
            ]
        );


        Company::create($data);
        //todo винести в model
        $company_id = Company::where('name', $request->input('name'))->get();
        session()->put('company_id', $company_id[0]->id);

        DB::table('company_company_owner')->updateOrInsert([
            'company_id'=> session()->get('company_id'),
            'company_owner_id'=> session()->get('companyOwner_id')
        ]);

        return redirect(route('company.step3'));
    }


    public function step3(): View
    {
        return view("auth.registration.step3", [
            'steps' => $this->registrationSteps,
            'step' => 3,
        ]);
    }


    public function addPhotoCompany(Request $request)
    {
        $data = $request->validate(
            [
                'company_photo' => 'required|image:jpg,jpeg,webP,png',
            ]
        );
        if($request->hasFile('company_photo')){
            $file_path = $request->company_photo->path();

            CompanyLogo::create([
                'company_id' => session()->get('company_id'),
                'path' => $file_path
            ]);
            return redirect(route('company.step4'));
        }

    }

    public function step4(): View
    {
        //todo винести в model
        $servicesDB = collect(Service::all()->where('company_id',session()->get('company_id')));
        $services = collect([]);
        if(count($servicesDB)>0){
            $services = $servicesDB->map(function ($item) {
                return [
                    'id' => $item->id,
                    'company_id' => $item->company_id,
                    'service_name' =>$item->name,
                    'service_price'=> $item->price,
                    'timeRange_hour'=>$item->timeRange_hour,
                    'timeRange_minutes'=>$item->timeRange_minutes,
                ];
            });
        }

        ;
        return view("auth.registration.step4", [
            'steps' => $this->registrationSteps,
            'step' => 4,
            'services'=> $services,
        ]);
    }


    public function step5(): View
    {
        //todo винести в model
        $employeesDB = collect(Employee::all()->where('company_id',session()->get('company_id')));
        $employees = collect([]);
        if(count($employeesDB)>0){
            $employees = $employeesDB->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'position'=> $item->position,
                    'email'=>$item->email,
                    'phone'=>$item->phone,
                    'scheduled_id'=>$item->employee_schedule_id,
                ];
            });
        }

        return view("auth.registration.step5", [
            'steps' => $this->registrationSteps,
            'step' => 5,
            'employees' => $employees,
        ]);



    }

    public function step6(): View
    {
//        $company = Company::find(session()->get('company_id'));
        $company = Company::find(2);



        return view("auth.registration.step6", [
            'steps' => $this->registrationSteps,
            'step' => 6,
            'company_id' => session()->get('company_id'),
            'company_name'=> $company->name,
        ]);

    }

    public function endstep()
    {
        // deleted all data from session
       session()->flush();

    }
}



<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanyLogo;
use App\Models\CompanyOwner;
use App\Models\CompanySchedule;
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
    private int $registrationSteps = 6;


    public function step1(): View
    {
        return view("auth.registration.step1");
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
        return view("auth.registration.step3");
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
        $company_id = session()->get('company_id');
        $services = Service::getServices($company_id);
        return view("auth.registration.step4", [
            'services'=> $services,
        ]);
    }

    public function step5(): View
    {
        $company_id = session()->get('company_id');
        $employees = Employee::getCompanyEmployees($company_id);
        $employeeModel = new Employee();

        return view("auth.registration.step5", [
            'employees' => $employees,
            'company_id'=>session()->get('company_id'),
            'tableDB'=>$employeeModel->getTable(),
        ]);

    }

    public function step6(): View
    {

        $companyModel = new Company();
        $scheduled_id = Company::find(session()->get('company_id'))->company_schedule_id;
        $scheduled = CompanySchedule::getScheduled($scheduled_id);

        return view("auth.registration.step6", [
            'company_id' => session()->get('company_id'),
            'tableDB'=>$companyModel->getTable(),
            'scheduled'=>$scheduled,
            'scheduled_id'=>$scheduled_id,
        ]);
    }

    public function endstep()
    {
        // deleted all data from session
       session()->flush();

    }
}



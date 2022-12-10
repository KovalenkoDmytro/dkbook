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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;


class CreateController extends HomeController
{

    public function step1(): View
    {
        if(Auth::check()){
            redirect(route('dashboard.main'));
        }
        return view("auth.registration.step1");
    }

    public function createOwner(Request $request)
    {
        $data = $request->validate(
            [
                'login' => [
                    'required',
                    Rule::unique('company_owners')->whereNull('deleted_at'),
                    'max:20'],
                'password' => [
                    'required',
                    Password::min(8)->mixedCase()->symbols()->numbers()->letters(),
                    ],
                'confirmPassword' => ['required', 'same:password'],
                'email' => [
                    'required',
                    Rule::unique('company_owners')->whereNull('deleted_at'),
                    'string',
                    'email',
                    'max:50',
                  ],
                'fullName' => ['required', 'string', 'max:35'],
                'phone' => [
                    'required',
                    Rule::unique('company_owners')->whereNull('deleted_at'),
                    'string',
                    'max:15'],
                'businessMode' => 'string',
                'timezone'=> 'string',
            ]
        );
        $owner_model = CompanyOwner::createUser($data);

        $company_owner = CompanyOwner::getUser($request->input('login'));
        session()->put('companyOwner_id', $company_owner[0]->id);

        if($owner_model){
            Auth::login($owner_model);

            return redirect()->intended(route('company.step2'));
        }

        return redirect(route('company.step1'))->withErrors([
            'formError' => 'Error when created user'
        ]);

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

    public function createCompany(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => [
                    'required',
                    Rule::unique('companies')->whereNull('deleted_at'),
                    'string',
                    'max:20'],
                'address' => ['required', 'string', 'max:20'],
                'socialMedia' => 'string',
                'business_type_id' => 'integer'
            ]
        );

        Company::create($data);
        //todo винести в model
        $company_id = Company::where('name', $request->input('name'))->get();
        session()->put('company_id', $company_id[0]->id);

        DB::table('company_company_owner')->updateOrInsert([
            'company_id' => session()->get('company_id'),
            'company_owner_id' => session()->get('companyOwner_id')
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
        if ($request->hasFile('company_photo')) {
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
//        $company_id = session()->get('company_id');
        $services = Service::getServices();
        return view("auth.registration.step4", [
            'services' => $services,
        ]);
    }

    public function step5(): View
    {
        $company_id = session()->get('company_id');
        $employeeModel = new Employee();
        $employees = Employee::getCompanyEmployees($company_id);

        return view("auth.registration.step5", [
            'employees' => $employees,
            'company_id' => session()->get('company_id'),
            'tableDB' => $employeeModel->getTable(),
        ]);

    }

    public function step6(): View
    {

        $companyModel = new Company();
        $scheduled_id = Company::find(session()->get('company_id'))->company_schedule_id;
        $scheduled = CompanySchedule::getScheduled($scheduled_id);

        return view("auth.registration.step6", [
            'company_id' => session()->get('company_id'),
            'tableDB' => $companyModel->getTable(),
            'scheduled' => $scheduled,
            'scheduled_id' => $scheduled_id,
        ]);
    }

    public function step7(): View
    {
        // deleted all data from session
//        session()->flush();
        return view('auth.registration.finallyStep');
    }
}



<?php

namespace App\Http\Controllers\Registration;

use App\Http\Requests\CreateCompany;
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

        if($owner_model){
            Auth::login($owner_model);
            return redirect()->intended(route('registration.step2'));
        }

        return redirect(route('registration.step1'))->withErrors([
            'formError' => 'Error when created user'
        ]);

    }

    public function step2(): View
    {
        return view("auth.registration.step2", [
            'business_type' => BusinessType::all()->pluck('name','id')->toArray()
        ]);
    }

    public function createCompany(CreateCompany $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $company = Company::create($data);
        $company->update(['company_owner_id' => Auth::user()->id]);

        return redirect(route('registration.step3'));
    }

    public function step3(): View
    {
        return view("auth.registration.step3");
    }

    public function addPhotoCompany(Request $request)
    {
        if ($request->hasFile('company_photo')) {
            CompanyLogo::create([
                'company_id' => Auth::user()->company->id,
                'path' => $request->company_photo->path()
            ]);
        }
        return redirect(route('registration.step4'));
    }

    public function step4(): View
    {
        return view("auth.registration.step4", [
            'services' => Auth::user()->company->services
        ]);
    }

    public function step5(): View
    {
        return view("auth.registration.step5", [
            'employees' => Auth::user()->company->employees,
            'company_id' => Auth::user()->company->id,
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



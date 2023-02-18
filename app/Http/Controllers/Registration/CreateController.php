<?php

namespace App\Http\Controllers\Registration;

use App\Models\BusinessType;
use App\Models\CompanyLogo;
use App\Models\CompanySchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class CreateController extends HomeController
{

    public function step1(): View
    {
        return view("auth.registration.step1");
    }


    public function step2(): View
    {
        return view("auth.registration.step2", [
            'business_type' => BusinessType::all()->pluck('name','id')->toArray(),
            'company'=> Auth::user()->company,
        ]);
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
        $scheduled = CompanySchedule::getScheduled(Auth::user()->company->company_schedule_id);
        return view("auth.registration.step6", [
            'scheduled' => $scheduled,
        ]);
    }

    public function step7(): View
    {
        return view('auth.registration.finallyStep');
    }
}



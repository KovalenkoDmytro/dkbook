<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompany;
use App\Models\Company;
use App\Models\CompanySchedule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function store(CreateCompany $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $company = Company::create($data);
        $companyScheduled = CompanySchedule::create([
            'monday' => '00:00 - 00:00',
            'tuesday' => '00:00 - 00:00',
            'wednesday' => '00:00 - 00:00',
            'thursday' => '00:00 - 00:00',
            'friday' => '00:00 - 00:00',
            'saturday' => '00:00 - 00:00',
            'sunday' => '00:00 - 00:00',
        ]);

        $company->update(['company_owner_id' => Auth::user()->id, 'company_schedule_id'=>$companyScheduled->id]);

        return redirect(route('registration.step3'));
    }

    public function update(CreateCompany $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $data = $request->validated();

            $company = Company::find(Auth::user()->company->id);
            $company->update($data);

            return redirect()->back()->with('success', 'company information has been update');

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

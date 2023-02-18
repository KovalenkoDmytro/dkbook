<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyOwner\CreateCompanyOwnerRequest;
use App\Http\Requests\CompanyOwner\UpdateCompanyOwnerRequest;
use App\Models\CompanyOwner;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyOwnerController extends Controller
{
    public function store(CreateCompanyOwnerRequest $request)
    {

        try {
            $owner_data = $request->validated();
            $owner_data['password'] = Hash::make($owner_data['password']);
            $company_owner = CompanyOwner::create($owner_data);

            Auth::login($company_owner);
            return redirect()->back()->with('success', 'company owner has been created');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);

        }
    }

    public function update(UpdateCompanyOwnerRequest $request)
    {
        try {
            $company_owner = CompanyOwner::find(Auth::user()->id);
            $company_owner_new_data = $request->validated();
            $company_owner->update($company_owner_new_data);
            return redirect()->back()->with('success', 'company owner has been updated');
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

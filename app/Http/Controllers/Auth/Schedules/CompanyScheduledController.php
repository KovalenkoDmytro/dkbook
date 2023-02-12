<?php

namespace App\Http\Controllers\Auth\Schedules;

use App\Http\Controllers\Controller;
use App\Models\CompanySchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyScheduledController extends HomeScheduledController
{

    public function update(Request $request)
    {
        try {
            $scheduled = Auth::user()->company->scheduled;
            $new_scheduled = $this->prepareScheduled($request->all());

            $scheduled->update($new_scheduled);
            return redirect()->back()->with('success', __('scheduled has been updated'));

        } catch (QueryException $exception) {
            return redirect()->back()->with('error', $exception->errorInfo[2]);
        }
    }
}

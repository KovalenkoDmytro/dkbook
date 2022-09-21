<?php

namespace App\Http\Controllers\Auth\Scheduled;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditScheduledController extends HomeScheduledController
{

    public function getCreatedScheduled(object $request):array
    {
        return $this->createScheduled($request);
    }



//    public function update(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
//    {
//        dd($request->all());
//
//
////        return redirect(route('company.step6'));
//
//    }
}

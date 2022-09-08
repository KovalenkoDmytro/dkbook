<?php

namespace App\Http\Controllers\Auth;

use App\Models\BusinessType;
use Illuminate\View\View;

class IndexController
{
   public function index($step):View{
        return view("auth.registration.step{$step}",[
            'steps' => 5,
            'step' => $step,
            'business_type'=> BusinessType::all()
        ]);
    }
}

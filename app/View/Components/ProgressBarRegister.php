<?php

namespace App\View\Components;

use App\Http\Controllers\Auth\Registration\CreateController;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class ProgressBarRegister extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.progress-bar-register', [
            'currentStep' => getCurrentStepRegistration()
        ]);
    }
}

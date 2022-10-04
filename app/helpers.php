<?php

use App\Http\Controllers\Auth\Registration\HomeController;
use Illuminate\Support\Str;



function getCurrentStepRegistration():array
{
    $currentStep = [];

    $currentClass = request()->route()->getActionName();
    $index = strrpos($currentClass, '@');
    $actionFunction = Str::substr($currentClass, $index);
    preg_match('!\d+!', $actionFunction, $step);

    $currentStep['stepNumber'] = $step[0];

    // get current step name
    $stepsName = HomeController::getStepsName();
    $currentStepName = $stepsName[$step[0]];

    $currentStep['stepName'] = $currentStepName;

    return $currentStep;
}

<?php

use App\Http\Controllers\Registration\HomeController;
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

function getRedirect()
{
    $registerProcess = session()->get('registerCurrentStep');
    $redirect = url()->previous();
    if (isset($registerProcess)){
        $redirect = route('company.step'.$registerProcess);
    }
    return $redirect;
}

function getTranslations($file) {
    if(!file_exists($file)) {
        return [];
    }

    return json_decode(file_get_contents($file), true);
}

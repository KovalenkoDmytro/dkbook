<?php

use Illuminate\Support\Str;



function getCurrentStepRegistration():int
{
    $currentClass = request()->route()->getActionName();
    $index = strrpos($currentClass, '@');
    $actionFunction = Str::substr($currentClass, $index);
    preg_match('!\d+!', $actionFunction, $step);
    return (int) $step[0];
}

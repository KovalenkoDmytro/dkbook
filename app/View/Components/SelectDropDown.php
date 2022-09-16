<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectDropDown extends Component
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

    public  function createHours (int $hours, int $minutesStep):array{
        $hoursArray = [];
        for($hour=0; $hour < $hours; $hour++) {
            for($count= 0; $count <= (60/$minutesStep); $count++) {
                if($hour < 10 ){
                    if($count == 0){
                        $hoursArray[] = '0'.$hour .':00';
                    }
                    elseif ($count+1 === (60/$minutesStep)){
                        $hoursArray[] = '0'.$hour .':'.$minutesStep*$count;
                    }
                    elseif ($count+1 != (60/$minutesStep) && ($minutesStep*$count !=60)){
                        $hoursArray[] = '0'.$hour .':'.$minutesStep*$count;
                    }
                }else{
                    if($count == 0){
                        $hoursArray[] = $hour .':00';
                    }
                    elseif ($count+1 === (60/$minutesStep)){
                        $hoursArray[] = $hour .':'.$minutesStep*$count;
                    }
                    elseif ($count+1 != (60/$minutesStep) && ($minutesStep*$count !=60)){
                        $hoursArray[] = $hour .':'.$minutesStep*$count;
                    }
                }
            }
        }
        return $hoursArray;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-drop-down',[
            'timeList' => $this->createHours(24,30)
        ]);
    }
}

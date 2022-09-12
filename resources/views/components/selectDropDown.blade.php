<?php
$options = [
    'timeFrom' => true,
    'timeList' => ['14:00','14:30','15:00','15:30','15:45']
]

?>
<div id="dropDown" class="dropDown">
    <input type="hidden" id="dropDown_input" name="{{$options['timeFrom']? 'timeFrom' : 'timeTo'}}" value="{{$options['timeList'][0]}}">
    <div class="dropDown_toggle" id="dropDownToggle">
        <span class="time">{{$options['timeList'][0]}}</span>
        <i class="icon icon_arrow-down"></i>
    </div>
    <ul id="dropDown_options" class="dropDown_options">
        @foreach($options['timeList'] as $index => $option)
            <li data-index="{{$index}}" class="dropDown_option">{{$option}}</li>
        @endforeach
    </ul>
</div>

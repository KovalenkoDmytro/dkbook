<div id="dropDown" class="dropDown">
    <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$timeList[0]}}">
    <div class="dropDown_toggle" id="dropDownToggle">
        <span class="time">{{$timeList[0]}}</span>
        <i class="icon icon_arrow-down"></i>
    </div>
    <ul id="dropDown_options" class="dropDown_options">
        @foreach($timeList as $index => $option)
            <li data-index="{{$index}}" class="dropDown_option">{{$option}}</li>
        @endforeach
    </ul>
</div>

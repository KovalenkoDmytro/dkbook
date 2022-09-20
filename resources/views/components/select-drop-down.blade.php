<div id="dropDown" class="dropDown">
    @if($attributes['value'])
        <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$attributes['value']}}">
    @else
        <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$timeList[0]}}">
    @endif
    <div class="dropDown_toggle" id="dropDownToggle">

        @if($attributes['value'])
            <span class="time">{{$attributes['value']}}</span>
        @else
            <span class="time">{{$timeList[0]}}</span>
        @endif
        <i class="icon icon_arrow-down"></i>
    </div>
    <ul id="dropDown_options" class="dropDown_options">
        @foreach($timeList as $index => $option)
            <li data-index="{{$index}}" class="dropDown_option">{{$option}}</li>
        @endforeach
    </ul>
</div>

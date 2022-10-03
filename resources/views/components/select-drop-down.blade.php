{{--@props([--}}
{{--    'customProps'=>''--}}
{{--])--}}

{{--<div id="dropDown" class="dropDown">--}}
{{--    @if($attributes['value'])--}}
{{--        <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$attributes['value']}}">--}}
{{--    @elseif($customProps)--}}
{{--        <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$customProps[0]}}">--}}
{{--    @else--}}
{{--        <input type="hidden" id="dropDown_input" name="{{$attributes['name']??''}}" value="{{$timeList[0]}}">--}}
{{--    @endif--}}
{{--    <div class="dropDown_toggle" id="dropDownToggle">--}}

{{--        @if($attributes['value'])--}}
{{--            <span class="time">{{$attributes['value']}}</span>--}}
{{--        @elseif($customProps)--}}
{{--            <span class="time">{{$customProps[0]}}</span>--}}
{{--        @else--}}
{{--            <span class="time">{{$timeList[0]}}</span>--}}
{{--        @endif--}}
{{--        <i class="icon icon_arrow-down"></i>--}}
{{--    </div>--}}
{{--    <ul id="dropDown_options" class="dropDown_options" style="z-index: 2">--}}
{{--        @if($customProps)--}}
{{--            @foreach($customProps as $index => $option)--}}
{{--                <li data-index="{{$index}}" class="dropDown_option">{{$option}}</li>--}}
{{--            @endforeach--}}
{{--        @else--}}
{{--            @foreach($timeList as $index => $option)--}}
{{--                <li data-index="{{$index}}" class="dropDown_option">{{$option}}</li>--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--    </ul>--}}
{{--</div>--}}

@props([
    'name' => '',
    'custom_properties_name' => false,
    'custom_values'=>false,
])

<div id="dropDown" class="dropDown {{$class ?? ''}}">

    @if($attributes['value'])
        <input type="hidden" id="dropDown_input" name="{{$name}}" value="{{$attributes['value']}}">
    @elseif($custom_properties_name)
        <input type="hidden" id="dropDown_input" name="{{$name}}" value="{{$custom_values[0]}}">
    @else
        <input type="hidden" id="dropDown_input" name="{{$name}}" value="{{$timeList[0]}}">
    @endif

    <div class="dropDown_toggle" id="dropDownToggle">
        @if($attributes['value'])
            <span class="time">{{$attributes['value']}}</span>
        @elseif($custom_properties_name)
            <span class="time">{{$custom_properties_name[0]}}</span>
        @else
            <span class="time">{{$timeList[0]}}</span>
        @endif
        <i class="icon icon_arrow-down"></i>
    </div>

    <ul id="dropDown_options" class="dropDown_options" style="z-index: 2">
        @if($custom_properties_name)
            @foreach($custom_properties_name as $index => $option)
                <li data-value="{{$custom_values[$index]}}" class="dropDown_option">{{$option}}</li>
            @endforeach
        @else
            @foreach($timeList as $index => $option)
                <li data-value="{{$option}}" class="dropDown_option">{{$option}}</li>
            @endforeach
        @endif
    </ul>
</div>

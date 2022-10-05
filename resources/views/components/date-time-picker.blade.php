<div class="date-time-picker">
    @isset($title)
        <h2>{{$title ?? ''}}</h2>
    @endif

    @isset($subtitle)
        <p>{{$subtitle ?? ''}}</p>
    @endif

        @csrf
        @if($attributes['id'])
            <input type="hidden" value="{{$attributes['id']}}" name="id" />
        @endif
        @if($attributes['table'])
            <input type="hidden" value="{{$attributes['table']}}" name="table" />
        @endif

        <div class="days">
            @if($attributes['update_scheduled'])
                @foreach($attributes['update_scheduled'] as $day => $hours)
                    @php
                        $hourFromValue = strpos($hours,' ');
                        $hourFrom = substr($hours,0,$hourFromValue);

                        $hourToValue = strrpos($hours,' ');
                        $hourTo = substr($hours,$hourToValue);
                    @endphp
                    <div class="day_row">
                        <input type="checkbox" name="{{$day}}">
                        <span>{{$day}}</span>
                        <div class="hours">
                            <x-select-drop-down  name="{{$day}}_from" :value="$hourFrom"/>
                            <x-select-drop-down name="{{$day}}_to" :value="$hourTo"/>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($schedule_days as $day)
                    <div class="day_row">
                        <input type="checkbox" name="{{$day}}">
                        <span>{{$day}}</span>
                        <div class="hours">
                            <x-select-drop-down name="{{$day}}_from"/>
                            <x-select-drop-down name="{{$day}}_to"/>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <a class="btn close" href="{{url()->previous()}}"> close __permanent</a>
</div>

<div class="date-time-picker">
    @isset($title)
        <h2>{{$title ?? ''}}</h2>
    @endif

    @isset($subtitle)
        <p>{{$subtitle ?? ''}}</p>
    @endif



        @csrf
        <input type="hidden" value="{{$attributes['id']}}" name="id" />
        <input type="hidden" value="{{$attributes['table']}}" name="table" />
        <div class="days">
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
        </div>
        <button type="submit">Send data </button>

</div>

<div class="date-time-picker">
    <h2>{{$title ?? ''}}</h2>
    <p>{{$subtitle ?? ''}}</p>

    <form action="" method="post">
        @csrf
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
        <button type="submit"> Send data</button>
    </form>
</div>

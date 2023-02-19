@props(
['scheduled'=>false]
)
<div class="date-time-picker">
    @foreach($schedule_days as $day)
        @php
            $hour_from__index = strpos($scheduled[$day],'-');
            $hour_from = trim(substr($scheduled[$day],0,$hour_from__index));
            $hour_from_hour = strpos($hour_from,':');
            $hour_from_hour = substr($hour_from,0,$hour_from_hour);
            $hour_from_minutes = strrpos($hour_from,':');
            $hour_from_minutes = substr($hour_from,$hour_from_minutes+1);

            $hour_to__index = strrpos($scheduled[$day],'-');
            $hour_to = trim(substr($scheduled[$day],$hour_to__index+1));
            $hour_to_hour = strpos($hour_to,':');
            $hour_to_hour = substr($hour_to,0,$hour_to_hour);
            $hour_to_minutes = strrpos($hour_to,':');
            $hour_to_minutes = substr($hour_to,$hour_to_minutes+1);
        @endphp
        <div class="date-time-picker__item">
            <label>
                <input type="checkbox" >
                <span>{{$day}}</span>
            </label>
            <div class="timeRange">
                <div class="timeRange_item __from">
                    <div class="hour">
                        <x-dropDownList
                            name="{{$day}}[from][hour]"
                        >
                            <x-slot:options>
                                @foreach(range(0, 23) as $hour)
                                    <option value=" {{$hour < 10 ? '0'.$hour : $hour}}"
                                        @selected((int)$hour_from_hour === $hour)
                                    >
                                        {{$hour < 10 ? '0'.$hour : $hour}}h
                                    </option>
                                @endforeach
                            </x-slot:options>
                        </x-dropDownList>
                    </div>
                    <div class="minutes">
                        <x-dropDownList
                            name="{{$day}}[from][minutes]"
                        >
                            <x-slot:options>
                                @foreach(range(0, 59,10) as $minutes)
                                    <option value="{{$minutes === 0 ? '00' : $minutes}}"
                                        @selected((int)$hour_from_minutes === $minutes)
                                    >
                                        {{$minutes === 0 ? '00' : $minutes}}min
                                    </option>
                                @endforeach
                            </x-slot:options>
                        </x-dropDownList>
                    </div>
                </div>
                <p> : </p>
                <div class="timeRange_item __to">
                    <div class="hour">
                        <x-dropDownList
                            name="{{$day}}[to][hour]"
                        >
                            <x-slot:options>
                                @foreach(range(0, 23) as $hour)
                                    <option value=" {{$hour < 10 ? '0'.$hour : $hour}}"
                                        @selected((int)$hour_to_hour === $hour)
                                    >
                                        {{$hour < 10 ? '0'.$hour : $hour}}h
                                    </option>
                                @endforeach
                            </x-slot:options>
                        </x-dropDownList>
                    </div>
                    <div class="minutes">
                        <x-dropDownList
                            name="{{$day}}[to][minutes]"
                        >
                            <x-slot:options>
                                @foreach(range(0, 59,5) as $minutes)
                                    <option value="{{$minutes === 0 ? '00' : $minutes}}"
                                        @selected((int)$hour_to_minutes === $minutes)
                                    >
                                        {{$minutes === 0 ? '00' : $minutes}}min
                                    </option>
                                @endforeach
                            </x-slot:options>
                        </x-dropDownList>
                    </div>
                </div>
            </div>
        </div>

@endforeach



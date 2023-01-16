{{--@props(--}}
{{--['scheduled'=>false]--}}
{{--)--}}
{{--<div class="date-time-picker">--}}
{{--    @dump($schedule_days)--}}
{{--    @isset($title)--}}
{{--        <h2>{{$title ?? ''}}</h2>--}}
{{--    @endif--}}

{{--    @isset($subtitle)--}}
{{--        <p>{{$subtitle ?? ''}}</p>--}}
{{--    @endif--}}

{{--        <a class="btn icon icon_close" href="{{url()->previous()}}"></a>--}}
{{--        <div class="days">--}}

{{--            @if($scheduled)--}}
{{--                @foreach($scheduled as $day => $hours)--}}
{{--                    @php--}}
{{--                        $hourFromValue = strpos($hours,' ');--}}
{{--                        $hourFrom = substr($hours,0,$hourFromValue);--}}

{{--                        $hourToValue = strrpos($hours,' ');--}}
{{--                        $hourTo = substr($hours,$hourToValue);--}}
{{--                    @endphp--}}
{{--                @dump($hourToValue)--}}
{{--                    <div class="day_row">--}}
{{--                        <label>--}}
{{--                            <input type="checkbox" >--}}
{{--                            <span>{{$day}}</span>--}}
{{--                        </label>--}}

{{--                        <div class="timeRange">--}}
{{--                            <div class="timeRange_item">--}}
{{--                                <span>{{__('Hour')}}</span>--}}
{{--                                <x-dropDownList--}}
{{--                                    class="hour"--}}
{{--                                    name="timeRange_hour"--}}
{{--                                >--}}
{{--                                    <x-slot:options>--}}
{{--                                        @foreach(range(0, 23) as $hour)--}}
{{--                                            <option value="{{$hour}}"--}}
{{--                                                @selected($hour == $hourFrom)--}}
{{--                                            >--}}
{{--                                                {{$hour}}h--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </x-slot:options>--}}
{{--                                </x-dropDownList>--}}
{{--                            </div>--}}

{{--                            <div class="timeRange_item">--}}
{{--                                <span>{{__('Hour')}}</span>--}}
{{--                                <x-dropDownList--}}
{{--                                    class="hour"--}}
{{--                                    name="timeRange_hour"--}}
{{--                                >--}}
{{--                                    <x-slot:options>--}}
{{--                                        @foreach(range(0, 23) as $hour)--}}
{{--                                            <option value="{{$hour}}"--}}
{{--                                                @selected($hour == $hourTo)--}}
{{--                                            >--}}
{{--                                                {{$hour}}h--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </x-slot:options>--}}
{{--                                </x-dropDownList>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="hours">--}}
{{--                            <x-select-drop-down  name="{{$day}}_from" :value="$hourFrom"/>--}}
{{--                            <x-select-drop-down name="{{$day}}_to" :value="$hourTo"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @else--}}
{{--            @if()--}}
{{--                @foreach($schedule_days as $day)--}}
{{--                    <div class="day_row">--}}
{{--                        <label>--}}
{{--                            <input type="checkbox" >--}}
{{--                            <span>{{$day}}</span>--}}
{{--                        </label>--}}

{{--                        <div class="hours">--}}

{{--                            <div class="timeRange_item">--}}
{{--                                <span>{{__('Minutes')}}</span>--}}
{{--                                <x-dropDownList--}}
{{--                                    class="minutes"--}}
{{--                                    name="timeRange_minutes"--}}
{{--                                >--}}
{{--                                    <x-slot:options>--}}
{{--                                        @foreach(range(0, 59, 5) as $minute)--}}
{{--                                            <option value="{{$minute}}" @selected($minute === $service->timeRange_minutes)>--}}
{{--                                                {{$minute}}min--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </x-slot:options>--}}
{{--                                </x-dropDownList>--}}
{{--                            </div>--}}
{{--                            --}}
{{--                            <x-select-drop-down name="{{$day}}_from"/>--}}
{{--                            <x-select-drop-down name="{{$day}}_to"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endif--}}

{{--            @endif--}}
{{--        </div>--}}
{{--</div>--}}

<div class="date-time-picker">
    <h2>working hours</h2>
    <p>how is your working hours ? </p>

    <form action="{{route('createScheduledTime')}}" method="post">
        @csrf
        <div class="days">
            @foreach($schedule_days as $day)
                <div class="day_row">
                    <input type="checkbox" name="{{$day}}">
                    <span>{{$day}}</span>
                    <div class="hours"> close</div>
                </div>
            @endforeach
        </div>
        <button type="submit"> Next page</button>
    </form>

    <div class="modal-window">
        <p class="day">day</p>
        <p class="text">some text</p>
        <div class="time-picker">
            <p>working hours</p>
            <div>

            </div>
        </div>
    </div>


    <x-time-picker></x-time-picker>

</div>

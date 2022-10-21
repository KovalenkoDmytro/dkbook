<ul class="scheduled_items">
    @foreach($scheduled as $day => $hours)
        <li class="scheduled_item">
            <div class="day">{{$day}}</div>
            <div class="hours">{{$hours}}</div>
        </li>
    @endforeach
</ul>


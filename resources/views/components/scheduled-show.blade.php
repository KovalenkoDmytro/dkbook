<h1>Scheduled Component</h1>

<ul class="scheduled_items">

    @foreach($scheduled as $day => $hours)
        <li class="scheduled_item">
            <span class="day">{{$day}}</span>
            <span class="hours">{{$hours}}</span>
        </li>
    @endforeach
</ul>


<?php
?>

<h1>Create service page</h1>

<form action="{{route('services.store')}}" method="post">
    @csrf
    <p> Add service</p>
    <label for="service_name">Service name</label>
    <input id="service_name" type="text" name="name">

    <div class="service-timeRange">
        <p>Time range service</p>

        <div class="timeRange">
            <label for="timeRange_hour">Hour</label>
            <input id="timeRange_hour" type="text" name="timeRange_hour">

            <label for="timeRange_minutes">minutes</label>
            <input id="timeRange_minutes" type="text" name="timeRange_minutes">
        </div>
    </div>

    <label for="service_price">Service Price</label>
    <input id="service_price" type="text" name="price">

    <button type="submit">Add</button>
</form>

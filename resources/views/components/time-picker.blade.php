<?php
?>
<div class="time-picker">
    <span class="time-picker_title">Enter time</span>
    <form action="{{route('company.create')}}" method="post">
        @csrf
        <div class="time-picker_inputs-field">
            <label for="hour">
                <input id="hour" placeholder="07">
                <span>Hour</span>
            </label>
            <span>:</span>
            <label for="minute">
                <input id="minute" placeholder="00">
                <span>Minute</span>
            </label>
            <div class="clock-format">
                <label for="am">
                    <input id="am" type="radio" name="clock_format">
                    <span>AM</span>
                </label>
                <label for="pm">
                    <input id="pm" type="radio" name="clock_format">
                    <span>PM</span>
                </label>
            </div>
        </div>
        <button class="time_picker"> Send data</button>
    </form>

    <div class="time-picker_footer">
        <i class="clock-icon"></i>
        <div class="footer_buttons">
            <button class="btn btn__cancel">Cancel</button>
            <button class="btn btn__success">Ok</button>
        </div>
    </div>
</div>

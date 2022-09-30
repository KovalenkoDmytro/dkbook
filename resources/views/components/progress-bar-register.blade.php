

<ul class="step_items">
    @for($i=1; $i <= 7; $i++)
        @if($currentStep > $i)
            <li class="step_item done">
                <span class="step_number">{{$i}}</span>
                <span class="step_desc">{{$steps[$i]}}</span>
            </li>
        @elseif($currentStep === $i)
            <li class="step_item active">
                <span class="step_number">{{$i}}</span>
                <span class="step_desc">{{$steps[$i]}}</span>
            </li>
        @else
            <li class="step_item">
                <span class="step_number">{{$i}}</span>
                <span class="step_desc">{{$steps[$i]}}</span>
            </li>
        @endif
    @endfor
</ul>


@props([
    'id'=>'id_'.Illuminate\Support\Str::uuid(),
    'label'=>false,
    'options'=>false,
])

<div class="drop-down-selector">
    @if($label)
        <label for="{{$id}}">{{__("service")}}</label>
    @endif

    <select id="{{$id}}" autocomplete="off" {{$attributes}}>
        @if($options)
            <option value="">Select a ...</option>
            @foreach($options as $option)
                <option value="{{$option->id}}">
                    {{$option->name}}
                </option>
            @endforeach
        @endif
    </select>

</div>



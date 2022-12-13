@props([
    'id'=>'id_'.Illuminate\Support\Str::uuid(),
    'label'=>false,
    'options'=>false,
])

<div class="drop-down-selector">
    @if($label)
        <label for="{{$id}}">{{__("service")}}</label>
    @endif

    @if($options)
        <select id="{{$id}}" autocomplete="off" {{$attributes}}>
            @foreach($options as $option)
                <option value="{{$option->id}}">
                    {{$option->name}}
                </option>
            @endforeach
        </select>
    @endif


</div>



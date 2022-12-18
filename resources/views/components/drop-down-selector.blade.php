@props([
    'id'=>'id_'.Illuminate\Support\Str::uuid(),
    'label'=>false,
    'options'=>false,
    'name'=>'',
    'error'=>false,
])

<div class="drop-down-selector">
    @if($error)
        <p class="error">{{$error}}</p>
    @endif
    @if($label)
        <label for="{{$id}}">{{$label}}</label>
    @endif

    <select id="{{$id}}" autocomplete="off" {{$attributes}} name="{{$name}}">
        @if($options)
            <option value="">{{__("Select a ...")}}</option>
            @foreach($options as $option)
                <option value="{{$option->id}}">
                    {{$option->name}}
                </option>
            @endforeach
        @endif
    </select>

</div>



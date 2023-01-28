@php($default_id = Str::uuid())

@props([
    'for'=>$default_id,
'type'=>'text',
'id'=>$default_id,
'name'=>'example',
'value'=>'',
'placeholder'=> '',
'text'=>'example',
'error'=>false,
'label'=>false
])

@if($type === 'checkbox')
    <div class="input_group checkbox">
        <input type='checkbox'
               id='{{$id}}'
               name='{{$name}}'>

        @if($label)
            <label for='{{$id}}'>
                <span class="input_title">{{$label}}</span>
            </label>

        @endif

    </div>
@else
    <label class="{{$error? 'input_group validate_error' : 'input_group'}}" for='{{$id}}'>
        <span class="input_title">{{$text}}</span>
        @if($slot->isNotEmpty())
            <div class="input_icon">
                {{$slot}}
                <input type='{{$type}}' id='{{$id}}' name='{{$name}}' placeholder="{{$placeholder}}" value="{{$value}}">
            </div>
        @else
            <input type='{{$type}}' id='{{$id}}' name='{{$name}}' placeholder="{{$placeholder}}" value="{{$value}}">
        @endif
        <p class="error">{{$error}}</p>
    </label>
@endif




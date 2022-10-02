@php($default_id = Str::uuid())

@props(['for'=>$default_id,
'type'=>'text',
'id'=>$default_id,
'name'=>'example',
'placeholder'=> '',
'text'=>'example',
'error'=>false,
])

<label class="{{$error? 'input_group validate_error' : 'input_group'}}" for='{{$for}}'>
    <span class="input_title">{{$text}}</span>
    <input type='{{$type}}' id='{{$id}}' name='{{$name}}' placeholder="{{$placeholder}}">
    <p class="error">{{$error}}</p>
</label>

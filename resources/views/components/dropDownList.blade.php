@props([
   'placeholder' => false,
   'name'=>false,
])

<div id="dropDownList" {{ $attributes->merge(['class' => 'dropDownList']) }}>
    <select autocomplete="off"
            @if($placeholder)
                placeholder="{{$placeholder}}"
            @endif
            @if($name)
                name="{{$name}}"
        @endif
    >

        @if(isset($options))
            {{$options}}
        @endif
    </select>
</div>

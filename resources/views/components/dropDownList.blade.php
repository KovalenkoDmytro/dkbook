@props([
   'placeholder' => false,
   'name'=>false,
  'label'=>false,
  'multiple'=>false,
])

<div id="dropDownList" {{ $attributes->merge(['class' => 'dropDownList']) }}>
    @if($label)
        <span class="label">{{$label}}</span>
    @endif
    <select autocomplete="off"
            @if($placeholder)
                placeholder="{{$placeholder}}"
            @endif
            @if($name)
                name="{{$name}}"
            @endif
            @if($multiple)
                multiple
            @endif
    >

        @if(isset($options))
            {{$options}}
        @endif
    </select>
</div>

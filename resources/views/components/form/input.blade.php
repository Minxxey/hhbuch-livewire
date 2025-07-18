@props([
    'type' => 'text',
    'name' => '',
    'labelText' => ''
])
<div class="input flex flex-col mb-1">
    <label for="{{$name}}" class="text-text text-lg mb-[10px]">{{$labelText}}</label>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" {{ $attributes->merge([
            'class' => 'border-text border-1 py-[5px] px-[15px] w-full outline-text ring-0 text-text'
        ]) }}>
</div>

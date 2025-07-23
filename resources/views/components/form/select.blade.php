@props([
    'name' => '',
    'labelText' => '',
    'arrayData' => []
])
<div class="flex flex-col mb-1 text-text text-lg">
    <label for="{{ $name }}" class="text-text text-lg mb-[10px]">{{ $labelText }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'border-text border-1 py-[5px] px-[5px] outline-text ring-0']) }}>
    <option value="">Bitte wählen</option>
        @foreach($arrayData as $key => $value)
            <option value="{{ $key }}" class="bg-background">{{ $value }}</option>
        @endforeach
    </select>
</div>

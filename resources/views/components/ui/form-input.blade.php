<!-- resources/views/components/ui/form-input.blade.php -->
@props([
    'type' => 'text',
    'name',
    'id' => null,
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'autofocus' => false,
    'rows' => 4
])

@php
    $inputId = $id ?? $name;
@endphp

<div class="form-group mb-6">
    @if($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium mb-2 opacity-90">{{ $label }}</label>
    @endif

    @if($type === 'textarea')
        <textarea 
            id="{{ $inputId }}" 
            name="{{ $name }}" 
            rows="{{ $rows }}"
            {{ $required ? 'required' : '' }}
            {{ $autofocus ? 'autofocus' : '' }}
            placeholder="{{ $placeholder }}"
            class="form-input block w-full rounded-lg bg-white/10 border-gray-600 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 text-white"
        >{{ $value }}</textarea>
    @else
        <input 
            type="{{ $type }}" 
            id="{{ $inputId }}" 
            name="{{ $name }}" 
            value="{{ $value }}"
            {{ $required ? 'required' : '' }}
            {{ $autofocus ? 'autofocus' : '' }}
            placeholder="{{ $placeholder }}"
            class="form-input block w-full rounded-lg bg-white/10 border-gray-600 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 text-white"
        >
    @endif

    @error($name)
        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
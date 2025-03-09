@props([
 'type' => 'button',
 'variant' => 'primary',
 'size' => 'md',
 'fullWidth' => false,
])
@php
 $baseClasses = 'inline-flex items-center justify-center rounded-lg font-medium transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2';
 $variants = [
 'primary' => 'bg-[rgba(195,183,15,0.76)] text-white hover:bg-[rgba(195,183,15,0.9)] focus:ring-yellow-500',
 'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
 'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
 'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
 'contact' => 'bg-[rgba(195,183,15,0.8)] text-white hover:bg-[rgba(195,183,15,1)] shadow-md hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:ring-yellow-500',
 'dark' => 'bg-gray-800/80 text-white border border-gray-600 hover:bg-gray-700/90 hover:border-gray-500 shadow-sm hover:shadow-md focus:ring-gray-400',
 'ghost' => 'bg-transparent text-white border border-gray-600 hover:bg-white/10 hover:border-gray-400 focus:ring-gray-400',
 ];
 $sizes = [
 'sm' => 'px-3 py-2 text-sm',
 'md' => 'px-4 py-2 text-base',
 'lg' => 'px-6 py-3 text-lg',
 ];
 $classes = $baseClasses . ' ' .
 $variants[$variant] . ' ' .
 $sizes[$size] . ' ' .
 ($fullWidth ? 'w-full' : '');
@endphp
<button
type="{{ $type }}"
{{ $attributes->merge(['class' => $classes]) }}
>
 {{ $slot }}
</button>
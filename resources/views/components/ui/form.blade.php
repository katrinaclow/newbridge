<!-- resources/views/components/ui/form.blade.php -->
@props([
    'action',
    'method' => 'POST',
    'title' => null,
    'hasFiles' => false
])

<form 
    action="{{ $action }}" 
    method="{{ strtolower($method) === 'get' ? 'get' : 'post' }}" 
    class="bg-black/40 backdrop-blur-sm shadow-xl rounded-lg p-8"
    {{ $hasFiles ? 'enctype="multipart/form-data"' : '' }}
>
    @csrf
    @if(strtolower($method) !== 'post' && strtolower($method) !== 'get')
        @method($method)
    @endif

    @if($title)
        <h3 class="text-xl mb-6 font-bold">{{ $title }}</h3>
    @endif

    {{ $slot }}
</form>
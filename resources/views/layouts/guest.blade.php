<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Newbridge Music') }}</title>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a062562745.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased text-white">
    <div class="min-h-screen bg-cover bg-fixed bg-center relative" 
         style="background-image: url('/images/band-photo-2024.jpg')">
        <!-- Overlay for better readability -->
        <div class="absolute inset-0 bg-black/50 z-0"></div>
        
        <!-- Content -->
        <div class="relative z-10 min-h-screen flex items-center justify-center py-12">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
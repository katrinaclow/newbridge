<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newbridge Music</title>
    <script src="https://kit.fontawesome.com/a062562745.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-white">
    <div class="min-h-screen bg-cover bg-fixed bg-center relative" 
         style="background-image: url('/images/band-photo-2024.jpg')">
        <!-- Overlay for better readability -->
        <div class="absolute inset-0 bg-black/50 z-0"></div>
        
        <!-- Content -->
        <div class="relative z-10">
            <x-layout.navigation />
            
            <main class="overflow-hidden">
                @yield('content')
            </main>
            
            <x-layout.footer />
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
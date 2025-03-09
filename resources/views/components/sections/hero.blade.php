<!-- resources/views/components/sections/hero.blade.php -->
<section id="hero" class="min-h-screen flex items-center justify-center relative">
    
    <div class="content text-center">
    <h1 class="bandname text-5xl sm:text-6xl md:text-7xl lg:text-8xl mb-8 max-w-full overflow-hidden whitespace-normal">Newbridge</h1>
        <x-ui.social-links containerClass="flex justify-center space-x-8" />
    </div>
    
    <!-- Scroll indicator only in hero section -->
    <div class="scroll-indicator absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
            <path d="M7 13l5 5 5-5M7 7l5 5 5-5"></path>
        </svg>
    </div>
</section>
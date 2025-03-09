<!-- resources/views/components/sections/contact.blade.php -->
<!-- resources/views/components/sections/contact.blade.php -->
<div id="contact" class="contact content">
    <h2 class="contact-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-8 text-center">Contact Us</h2>
    <div class="contact-content max-w-2xl mx-auto">
        @if(session('success'))
        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
            {{ session('success') }}
        </div>
        @endif

        <x-ui.form :action="route('contact.submit')">
            <x-ui.form-input
                type="text"
                name="name"
                label="Name"
                required />

            <x-ui.form-input
                type="email"
                name="email"
                label="Email"
                required />

            <x-ui.form-input
                type="text"
                name="subject"
                label="Subject"
                required />

            <x-ui.form-input
                type="textarea"
                name="message"
                label="Message"
                rows="4"
                required />

            <div class="flex justify-center mt-6">
                <x-ui.button
                    type="submit"
                    variant="dark"
                    size="lg"
                    :full-width="false"
                    class="group">
                    <span class="flex items-center justify-center gap-2">
                        Send Message
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                </x-ui.button>
            </div>
        </x-ui.form>
    </div>
</div>
<x-guest-layout>
    <div class="content text-center">
        <h2 class="contact-title text-4xl sm:text-5xl md:text-6xl lg:text-7xl mb-8 text-center" style="font-family: 'TattooSailor', 'Open Sans', sans-serif;">Login</h2>
        <div class="contact-content max-w-2xl mx-auto">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <x-ui.form :action="route('login')">
                <x-ui.form-input
                    type="email"
                    name="email"
                    label="Email"
                    :value="old('email')"
                    required
                    autofocus />

                <x-ui.form-input
                    type="password"
                    name="password"
                    label="Password"
                    required />

                <div class="form-group mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded bg-white/10 border-gray-600 text-blue-400">
                        <span class="ms-2 text-sm text-white opacity-90">Remember me</span>
                    </label>
                </div>

                <div class="space-y-6 mt-6">

                    <!-- Log in button in a centered container -->
                    <div class="flex justify-center mt-6 mb-4">
                        <x-ui.button
                            type="submit"
                            variant="dark"
                            size="md"
                            class="group">
                            <span class="flex items-center justify-center gap-2">
                                {{ __('Log in') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </x-ui.button>
                    </div>

                    <!-- Forgot password link in a centered container -->
                    <div class="text-center mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-white/70 hover:text-white/90 transition duration-200"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
            </x-ui.form>
        </div>
    </div>
</x-guest-layout>
<!-- resources/views/components/layout/navigation.blade.php -->
<div class="flex-center position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link"
                            style="border: none; background: none; color: #fff; padding: 0 25px; font-size: 12px; font-weight: 600; letter-spacing: .1rem; text-decoration: none; text-transform: uppercase;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ url('/login') }}">Login</a>
            @endif
        </div>
    @endif
</div>
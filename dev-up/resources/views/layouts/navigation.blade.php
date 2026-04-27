@if (Auth::check())
<nav class="nav">
    <div class="nav-container">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="nav-logo">
            DEV↑UP
        </a>

        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'text-primary' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('challenges.index') }}" class="nav-link {{ request()->routeIs('challenges.*') ? 'text-primary' : '' }}">
                Challenges
            </a>
            <a href="{{ route('focus-sessions.index') }}" class="nav-link {{ request()->routeIs('focus-sessions.*') ? 'text-primary' : '' }}">
                Focus
            </a>
            
            <!-- User Menu -->
            <div class="relative">
                <button onclick="toggleUserMenu()" class="nav-link flex items-center gap-2">
                    {{ Auth::user()->name }}
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                
                <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleUserMenu() {
    const menu = document.getElementById('userMenu');
    menu.classList.toggle('hidden');
}

// Close menu when clicking outside
document.addEventListener('click', function(event) {
    const menu = document.getElementById('userMenu');
    const button = event.target.closest('button');
    
    if (!menu.contains(event.target) && (!button || !button.onclick)) {
        menu.classList.add('hidden');
    }
});
</script>
@endif

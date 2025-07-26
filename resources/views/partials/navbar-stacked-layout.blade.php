<header>
    <nav class="fixed z-30 w-full bg-white border-b border-gray-200 mb-6">
        <div class="flex justify-between items-center max-w-screen-2xl mx-auto px-4 py-3">
            <!-- Hamburger Button (mobile only) -->
            <button id="toggleMobileMenuButton" class="lg:hidden p-2 text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Logo -->
            <a href="{{ route('index') }}" class="flex items-center">
                <img src="{{ asset('storage/images/logo-bps.png') }}" class="h-10" alt="BPS Logo" />
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex space-x-6 text-sm font-medium">
                <li><a href="{{ route('view.dashboard') }}" class="text-gray-700 hover:text-primary-700">Dashboard</a></li>
                <li><a href="{{ route('view.pdrb') }}" class="text-gray-700 hover:text-primary-700">PDRB</a></li>
                <li><a href="{{ route('view.kesejahteraan') }}" class="text-gray-700 hover:text-primary-700">Kesejahteraan</a></li>
                <li><a href="#" class="text-gray-700 hover:text-primary-700">Ketenagakerjaan</a></li>
            </ul>

            <!-- Profile -->
            <div class="ml-auto relative">
                <button id="profile-dropdown" class="focus:outline-none">
                    <img src="{{ asset('storage/images/user.png') }}" class="w-8 h-8 rounded-full" alt="Profile">
                </button>
                <div id="dropdown-menu" class="hidden absolute right-0 top-full mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <ul class="text-sm text-gray-700">
                        @if(Auth::user()->isAdmin == 1)
                        <li><a href="{{ route('update.access') }}" class="block px-4 py-2 hover:bg-gray-100">Update Access</a></li>
                        @endif
                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 hover:bg-gray-100">Sign Out</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Overlay Menu -->
    <div id="toggleMobileMenu" class="hidden fixed top-0 left-0 w-full h-full bg-white z-50 flex-col px-6 pt-20 transition duration-300">
        <!-- Close Button -->
        <div class="flex justify-end mb-4">
            <button id="closeMobileMenuButton" class="text-3xl font-bold text-gray-700">&times;</button>
        </div>
        <!-- Navigation Items -->
        <ul class="space-y-6 text-lg font-medium">
            <li><a href="{{ route('view.dashboard') }}" class="block text-gray-900 hover:text-primary-700">Dashboard</a></li>
            <li><a href="{{ route('view.pdrb') }}" class="block text-gray-900 hover:text-primary-700">PDRB</a></li>
            <li><a href="{{ route('view.kesejahteraan') }}" class="block text-gray-900 hover:text-primary-700">Kesejahteraan</a></li>
            <li><a href="#" class="block text-gray-900 hover:text-primary-700">Ketenagakerjaan</a></li>
        </ul>
    </div>
</header>

<script>
    // Profile Dropdown
    const profileButton = document.getElementById("profile-dropdown");
    const dropdownMenu = document.getElementById("dropdown-menu");

    profileButton.addEventListener("click", function (event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });

    // Mobile Menu Overlay
    const toggleMobileMenuButton = document.getElementById("toggleMobileMenuButton");
    const closeMobileMenuButton = document.getElementById("closeMobileMenuButton");
    const toggleMobileMenu = document.getElementById("toggleMobileMenu");

    toggleMobileMenuButton.addEventListener("click", function () {
        toggleMobileMenu.classList.remove("hidden");
    });

    closeMobileMenuButton.addEventListener("click", function () {
        toggleMobileMenu.classList.add("hidden");
    });
</script>

<!-- loader -->
<div id="loader" class="animated-gradient">
        <img src="assets/img/logo.png" alt="Loading Logo" class="loader-logo">
    </div>

<!-- ======= Header ======= -->

    <header class="fixed top-2 sm:top-4 left-1/2 -translate-x-1/2 w-[96%] max-w-7xl rounded-2xl z-50 bg-[#541C1C]/60 backdrop-blur-lg border border-white/10">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="index.html" class="flex items-center gap-3">
                <img src="assets/img/logo2.jpg" class="h-12 w-12 rounded-full object-cover border-2 border-orange-400 p-1">
                <span class="font-bold text-xl hidden sm:block text-white">INSPIRA '25</span>
            </a>

            <button id="nav-toggle" class="sm:hidden text-white focus:outline-none">
                <svg id="hamburger" class="h-8 w-8 block" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close" class="h-8 w-8 hidden" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <nav id="nav-menu" class="hidden sm:flex space-x-8 items-center">
                <a href="index.html" class="nav-link font-semibold text-orange-400 hover:text-white transition">Home</a>
                <a href="about.html" class="nav-link font-semibold text-white hover:text-orange-400 transition">About</a>
                <a href="ticket.html" class="nav-link font-semibold text-white hover:text-orange-400 transition">Get Ticket</a>
                <a href="#" class="nav-link font-semibold text-white hover:text-orange-400 transition">Schedule</a>
            </nav>
        </div>

        <nav id="nav-menu-mobile" class="sm:hidden hidden px-6 pb-4 space-y-2 rounded-b-2xl">
            <a href="index.html" class="block py-2 font-semibold text-orange-400 hover:text-white transition">Home</a>
            <a href="about.html" class="block py-2 font-semibold text-white hover:text-orange-400 transition">About</a>
            <a href="ticket.html" class="block py-2 font-semibold text-white hover:text-orange-400 transition">Get Ticket</a>
            <a href="#" class="block py-2 font-semibold text-white hover:text-orange-400 transition">Schedule</a>
        </nav>
    </header>
    <!-- End Header -->
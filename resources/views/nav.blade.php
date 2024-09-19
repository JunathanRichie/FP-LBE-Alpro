<nav class="fixed w-full dark:bg-gray-950 bg-white dark:border-b-white border-b-black border-b-2 h-40 transition-colors duration-200 ease-in-out z-50">
    <div class="w-full flex flex-col items-center p-4">
        <div>
            <img src="{{ asset('images/logo1-dark.png') }}" alt="Logo" class="w-24 h-24 hidden dark:block">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-24 h-24 dark:hidden">
        </div>
        <div class="w-full flex justify-center gap-8">
            <a href="/" class="dark:text-white text-black">Home</a>
            <a href="/#" class="dark:text-white text-black">New Arrivals</a>
            <a href="/all-items" class="dark:text-white text-black">All Products</a>
            <a href="/#about" class="dark:text-white text-black">About Us</a>
            <a href="/#contact" class="dark:text-white text-black">Contact Us</a>
            <button id="theme-toggle" type="button" class="w-7 h-7 flex items-center justify-center text-black dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>  
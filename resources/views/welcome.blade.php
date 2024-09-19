<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LBE Alpro</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/logo-dark.png') }}" sizes="500x500">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
        <style>
            .nunito-sans {
                font-family: "Nunito Sans", sans-serif;
                font-optical-sizing: auto;
                font-weight: <weight>;
                font-style: normal;
                font-variation-settings:
                    "wdth" 100,
                    "YTLC" 500;
                }
            .left-42{
                left: 168px;
            }
        </style>
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="nunito-sans antialiased dark:bg-gray-900 bg-white transition-colors duration-200 ease-in-out">
        <nav class="fixed w-full dark:bg-gray-950 bg-white dark:border-b-white border-b-black border-b-2 h-40 transition-colors duration-200 ease-in-out z-50">
            <div class="w-full flex flex-col items-center p-4">
                <div>
                    <img src="{{ asset('images/logo1-dark.png') }}" alt="Logo" class="w-24 h-24 hidden dark:block">
                    <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-24 h-24 dark:hidden">
                </div>
                <div class="w-full flex justify-center gap-8">
                    <a href="#" class="dark:text-white text-black">Home</a>
                    <a href="#" class="dark:text-white text-black">New Arrivals</a>
                    <a href="#" class="dark:text-white text-black">All Products</a>
                    <a href="#about" class="dark:text-white text-black">About Us</a>
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
        <!-- Main Content -->
        <div class="pt-48"></div>
        <section id="display-items">
            <div class="grid grid-cols-5 w-3/4 mx-auto gap-10">
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
                <div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
                    <h2 class="text-base dark:text-white text-black">Laptop Gedagedi 5 AMD Ryzen 7</h2>
                    <h2 class="text-sm dark:text-white text-black font-semibold">Rp 15.000.000</h2>
                    <form class="w-28">
                        <label for="quantity" class="block text-xs font-medium text-gray-700 dark:text-white">Qty</label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity" 
                            class="mt-1 block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-800 dark:text-white"
                            placeholder="0"
                            min="0"
                        >
                    </form>
                    <button class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110">+</button>
                </div>
            </div>
        </section>
        <section id="about" class="min-h-screen flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-black dark:text-white mb-4">
                    LBE Alpro Kelompok 7
                </h1>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    An E-commerce Website.
                </p>
                <div class="grid grid-cols-4 gap-10 mx-auto w-full">
                    <!-- Member 1 -->
                    <div class="flex flex-col items-center bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img src="path-to-image.jpg" alt="Member 1" class="w-full h-full object-cover">
                        </div>
                        <div class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">Vinsario Shentana</div>
                    </div>
                    
                    <!-- Member 2 -->
                    <div class="flex flex-col items-center bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img src="path-to-image.jpg" alt="Member 2" class="w-full h-full object-cover">
                        </div>
                        <div class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">Junathan Richie</div>
                    </div>
                    
                    <!-- Member 3 -->
                    <div class="flex flex-col items-center bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img src="path-to-image.jpg" alt="Member 3" class="w-full h-full object-cover">
                        </div>
                        <div class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">Gerry Nicholas </div>
                    </div>

                    <!-- Member 4 -->
                    <div class="flex flex-col items-center bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                            <img src="path-to-image.jpg" alt="Member 4" class="w-full h-full object-cover">
                        </div>
                        <div class="mt-4 text-lg font-semibold text-gray-800 dark:text-white">Mathias Adya</div>
                    </div>
                </div>
            </div>
        </section>
        <section id="footer">
            <div class="w-full h-12 dark:border-t-white border-t-black border-t-2 text-black dark:text-white p-3">
                <h1 class="text-center">Copyright @Galaksi Bimasakti, Penakluk Dunia dan Bintang, Penjajah Semesta, dan Perwira Lubang Hitam Mahasakti</h1>
            </div>
        </section>
        <a href="{{ route('cart.index') }}">
            <div class="fixed bottom-10 right-10 w-14 h-14 flex justify-center items-center rounded-full dark:bg-white bg-gray-800 dark:text-black text-white hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out">
                <x-ionicon-cart-outline class="w-8 h-8" />
            </div>
        </a>
        <script>
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            var themeToggleBtn = document.getElementById('theme-toggle');

            themeToggleBtn.addEventListener('click', function() {

                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }

                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
                
            });
        </script>
    </body>
</html>

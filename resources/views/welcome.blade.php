@extends('app')

@section('title', 'Welcome')

@section('content')
    <div class="pt-48"></div>
    <section id="new-arrivals">
        <h1 class="text-4xl font-bold text-black dark:text-white text-center mb-8">New Arrivals</h1>
        <div class="grid grid-cols-5 w-3/4 mx-auto gap-10">
            <x-card name="Laptop Gedagedi 5 AMD Ryzen 7" price="15.000.000" />
            <x-card name="Laptop Gedagedi 5 AMD Ryzen 7" price="15.000.000" />
            <x-card name="Laptop Gedagedi 5 AMD Ryzen 7" price="15.000.000" />
            <x-card name="Laptop Gedagedi 5 AMD Ryzen 7" price="15.000.000" />
            <x-card name="Laptop Gedagedi 5 AMD Ryzen 7" price="15.000.000" />
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
    <section id="contact" class="min-h-screen flex flex-col items-center justify-center pt-10">
        <h1 class="text-4xl font-bold text-black dark:text-white mb-4">Contact Us</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6536963874446!2d112.79435397454613!3d-7.280186471545249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa121804672d%3A0xd14662f66b560d77!2sLaboratorium%20Algoritma%20dan%20Pemrograman!5e0!3m2!1sid!2sid!4v1726737404246!5m2!1sid!2sid" width="75%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100"></iframe>
    </section>
    <a href="{{ route('cart.index') }}">
        <div class="fixed bottom-10 right-10 w-14 h-14 flex justify-center items-center rounded-full dark:bg-white bg-gray-800 dark:text-black text-white hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out">
            <x-ionicon-cart-outline class="w-8 h-8" />
        </div>
    </a>
    @include('footer')
@endsection


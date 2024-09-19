<div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
    <img src="{{ asset('images/laptop.jpg') }}" alt="Laptop" class="w-full object-cover">
    <h2 class="text-base dark:text-white text-black">{{ $name }}</h2>
    <h2 class="text-sm dark:text-white text-black font-semibold">Rp {{ $price }}</h2>
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
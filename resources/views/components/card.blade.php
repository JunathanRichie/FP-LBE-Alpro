@props(['gambar', 'name', 'price'])
<div class="relative flex flex-col gap-1 p-4 h-72 dark:border-gray-400 border-gray-300 border rounded-lg shadow-md shadow-gray-600 dark:shadow-teal-100">
    <img src="{{'images/'. $gambar}}" alt="Product Image" class="w-full object-cover overflow-hidden">
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
    <button 
        class="absolute -bottom-4 -right-4 w-12 h-12 rounded-full dark:bg-white bg-gray-800 text-white dark:text-black text-2xl font-bold hover:bg-blue-800 dark:hover:bg-blue-900 dark:hover:text-white transition-all duration-300 ease-in-out hover:scale-110" 
        onclick="showAlert('{{ $name }}', '{{ $price }}')"
    >
        +
    </button>
</div>

<script>
    function showAlert(name, price) {
        Swal.fire({
            title: "Successfully added to Cart!",
            html: 'Name: ' + name + '<br>Price: Rp ' + price,
            icon: "success",
            showCancelButton: true,
            confirmButtonText: 'Go to Cart',
            cancelButtonText: 'Close',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            reverseButtons: true, 
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('cart.index') }}";
            }
        });
    }
</script>

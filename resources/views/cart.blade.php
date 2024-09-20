@extends('app')

@section('title', 'Your Cart')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-4xl font-bold text-center mb-8">Your Shopping Cart</h1>
    
    <!-- Cart Table -->
    <div class="w-full lg:w-2/3 mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Product</th>
                    <th class="py-3 px-6 text-center">Quantity</th>
                    <th class="py-3 px-6 text-center">Price</th>
                    <th class="py-3 px-6 text-center">Total</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="cart-items" class="text-gray-600 text-sm font-light">
                <!-- Cart items will be injected here by JS -->
            </tbody>
        </table>
    </div>

    <!-- Cart Summary -->
    <div class="w-full lg:w-1/3 mx-auto bg-gray-50 shadow-md rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
        <div class="flex justify-between mb-3">
            <span class="text-gray-600">Subtotal</span>
            <span id="subtotal" class="font-semibold">Rp. 0</span>
        </div>
        <div class="flex justify-between mb-3">
            <span class="text-gray-600">Shipping</span>
            <span class="font-semibold">Rp. 20,000</span>
        </div>
        <div class="flex justify-between mb-4">
            <span class="text-gray-600">Total</span>
            <span id="total" class="font-semibold text-lg">Rp. 0</span>
        </div>
        <button class="w-full bg-green-500 text-white font-bold py-2 rounded hover:bg-green-600">
            Proceed to Checkout
        </button>
    </div>
</div>

<script>
    const userId = {{ $userId ?? 'null' }}; // Jika userId tidak ada, nilainya menjadi 'null'

    if (!userId) {
        window.location.href = '/login'; // Redirect ke halaman login jika belum login
    }
    // Function to fetch and display cart data
    async function fetchCartData() {
        const response = await fetch(`/cart/${userId}`);
        const data = await response.json();

        const cartItems = data.data;
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; // Clear any previous data

        let subtotal = 0;

        cartItems.forEach(item => {
            const totalItemPrice = item.harga_item * item.kuantitas;
            subtotal += totalItemPrice;

            cartItemsContainer.innerHTML += `
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="images/${item.image}" alt="Product Image">
                            <span class="font-medium">${item.nama_item}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <input type="number" value="${item.kuantitas}" class="border rounded w-12 text-center">
                    </td>
                    <td class="py-3 px-6 text-center">Rp. ${item.harga_item.toLocaleString()}</td>
                    <td class="py-3 px-6 text-center">Rp. ${totalItemPrice.toLocaleString()}</td>
                    <td class="py-3 px-6 text-center">
                        <button class="text-red-600 hover:text-red-800">Remove</button>
                    </td>
                </tr>
            `;
        });

        document.getElementById('subtotal').textContent = `Rp. ${subtotal.toLocaleString()}`;
        document.getElementById('total').textContent = `Rp. ${(subtotal + 20000).toLocaleString()}`; // Assuming shipping is Rp. 20,000
    }

    // Fetch cart data when the page loads
    window.onload = fetchCartData;
</script>
@endsection

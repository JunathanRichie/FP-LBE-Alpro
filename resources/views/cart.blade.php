@extends('app')

@section('title', 'Your Cart')

@section('content')
<div class="pt-48"></div>
<div class="container mx-auto py-12">
    <h1 class="text-4xl font-bold text-center mb-8 text-black dark:text-white">Your Shopping Cart</h1>
    
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
    const userId = {{ $userId ?? 'null' }}; 

    if (!userId) {
        window.location.href = '/login';
    }
    async function fetchCartData() {
        const response = await fetch(`/cart/${userId}`);
        const data = await response.json();

        const cartItems = data.data;
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = ''; 

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
                        <input type="number" value="${item.kuantitas}" class="border rounded w-12 text-center" id="quantity-${item.id_item}">
                    </td>
                    <td class="py-3 px-6 text-center">Rp. ${item.harga_item.toLocaleString()}</td>
                    <td class="py-3 px-6 text-center">Rp. ${totalItemPrice.toLocaleString()}</td>
                    <td class="py-3 px-6 text-center">
                        <button class="text-red-600 hover:text-red-800" onclick="removeFromCart(${userId}, '${item.id_item}')">Remove</button>
                    </td>
                </tr>
            `;
        });

        document.getElementById('subtotal').textContent = `Rp. ${subtotal.toLocaleString()}`;
        document.getElementById('total').textContent = `Rp. ${(subtotal + 20000).toLocaleString()}`; 
    }

    async function removeFromCart(userId, id_item) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const payload = {
            id_user: userId,
            id_item: id_item,
        };

        const response = await fetch('http://localhost:8000/cart/remove', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
        });

        // Periksa status respons
        if (response.ok) { // Jika status 200-299
            fetchCartData(); // Refresh the cart data after removal
        } else {
            const data = await response.json(); // Ambil data JSON jika ada error
            Swal.fire('Error', data.message || 'Something went wrong!', 'error');
        }
    }

    window.onload = fetchCartData;
</script>
@endsection

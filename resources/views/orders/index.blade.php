<x-admin-layout>
<div class="flex-1 p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-2">
            <i class="fas fa-shopping-cart mr-2"></i>Pemesanan Produk
        </h1>
        <nav class="text-sm breadcrumbs">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <i class="fas fa-home text-blue-500 mr-1"></i>
                    <a href="{{ route('dashboard') }}" class="text-blue-500">Gentle Baby</a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                </li>
                <li class="text-gray-500">Pemesanan Produk</li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Side - Company Selection and Products -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Company Selection -->
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Daftar Perusahaan</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search :</label>
                    <select id="company-select" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Nama Perusahaan</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" data-owner="{{ $company->owner_name }}" data-address="{{ $company->address }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Selected Company Details -->
                <div id="company-details" class="hidden">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-2 text-sm font-medium text-gray-600">Nama Perusahaan</th>
                                    <th class="text-left py-2 text-sm font-medium text-gray-600">Nama Pemilik</th>
                                    <th class="text-left py-2 text-sm font-medium text-gray-600">Alamat Perusahaan</th>
                                    <th class="text-left py-2 text-sm font-medium text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="selected-company-row" class="border-b">
                                    <td class="py-2 text-sm" id="company-name"></td>
                                    <td class="py-2 text-sm" id="company-owner"></td>
                                    <td class="py-2 text-sm" id="company-address"></td>
                                    <td class="py-2">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Daftar Produk</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search :</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>Nama Produk</option>
                    </select>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($products as $product)
                    <div class="product-card bg-white border rounded-lg p-4 hover:shadow-md transition-shadow" 
                         data-id="{{ $product->id }}" 
                         data-name="{{ $product->name }}" 
                         data-price="{{ $product->price }}">
                        <div class="aspect-square bg-gray-200 rounded-lg mb-3 flex items-center justify-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                            @else
                                <i class="fas fa-baby text-4xl text-gray-400"></i>
                            @endif
                        </div>
                        <h4 class="font-medium text-sm text-gray-800 mb-1">{{ $product->name }}</h4>
                        <p class="text-xs text-gray-500 mb-2">({{ $product->category->name ?? 'No Category' }})</p>
                        <p class="font-semibold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <button class="add-to-cart w-full mt-2 bg-green-500 text-white py-1 px-2 rounded text-xs hover:bg-green-600">
                            <i class="fas fa-plus mr-1"></i>Add to Cart
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Side - Shopping Cart -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Keranjang</h3>
            
            <!-- Selected Company Info -->
            <div id="cart-company-info" class="mb-4 p-3 bg-blue-50 rounded-lg hidden">
                <h4 class="font-medium text-sm text-blue-800">Perusahaan</h4>
                <p id="cart-company-name" class="text-sm text-blue-600"></p>
            </div>

            <!-- Cart Items -->
            <div id="cart-items" class="space-y-3 mb-4 min-h-[200px]">
                <div id="empty-cart" class="text-center text-gray-500 py-8">
                    <i class="fas fa-shopping-cart text-3xl mb-2"></i>
                    <p>Keranjang kosong</p>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-medium text-blue-600">Total Quantity</span>
                    <span id="total-quantity" class="font-bold text-blue-600">0</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="font-bold text-lg">Total</span>
                    <span id="total-amount" class="font-bold text-lg">Rp0</span>
                </div>
                <button id="checkout-btn" class="w-full bg-green-500 text-white py-3 rounded-lg font-medium hover:bg-green-600 disabled:bg-gray-300 disabled:cursor-not-allowed" disabled>
                    Checkout
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let selectedCompanyId = null;
let cart = [];

// Company selection
document.getElementById('company-select').addEventListener('change', function() {
    const select = this;
    const selectedOption = select.options[select.selectedIndex];
    
    if (selectedOption.value) {
        selectedCompanyId = selectedOption.value;
        
        // Show company details
        document.getElementById('company-name').textContent = selectedOption.text;
        document.getElementById('company-owner').textContent = selectedOption.dataset.owner;
        document.getElementById('company-address').textContent = selectedOption.dataset.address;
        document.getElementById('company-details').classList.remove('hidden');
        
        // Update cart company info
        document.getElementById('cart-company-name').textContent = selectedOption.text;
        document.getElementById('cart-company-info').classList.remove('hidden');
        
        updateCheckoutButton();
    } else {
        selectedCompanyId = null;
        document.getElementById('company-details').classList.add('hidden');
        document.getElementById('cart-company-info').classList.add('hidden');
        updateCheckoutButton();
    }
});

// Add to cart functionality
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const card = this.closest('.product-card');
        const productId = parseInt(card.dataset.id);
        const productName = card.dataset.name;
        const productPrice = parseFloat(card.dataset.price);
        
        // Check if product already in cart
        const existingItem = cart.find(item => item.product_id === productId);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                product_id: productId,
                name: productName,
                price: productPrice,
                quantity: 1
            });
        }
        
        updateCartDisplay();
        updateCheckoutButton();
    });
});

function updateCartDisplay() {
    const cartItemsContainer = document.getElementById('cart-items');
    const emptyCart = document.getElementById('empty-cart');
    
    if (cart.length === 0) {
        emptyCart.classList.remove('hidden');
        cartItemsContainer.innerHTML = '';
        cartItemsContainer.appendChild(emptyCart);
    } else {
        emptyCart.classList.add('hidden');
        cartItemsContainer.innerHTML = '';
        
        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.className = 'flex items-center justify-between p-3 bg-gray-50 rounded-lg';
            cartItem.innerHTML = `
                <div class="flex-1">
                    <h5 class="font-medium text-sm text-gray-800">${item.name}</h5>
                    <p class="text-xs text-gray-500">Rp ${new Intl.NumberFormat('id-ID').format(item.price)}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="decreaseQuantity(${index})" class="w-6 h-6 bg-red-500 text-white rounded text-xs hover:bg-red-600">-</button>
                    <span class="text-sm font-medium">${item.quantity}</span>
                    <button onclick="increaseQuantity(${index})" class="w-6 h-6 bg-green-500 text-white rounded text-xs hover:bg-green-600">+</button>
                </div>
                <button onclick="removeFromCart(${index})" class="ml-2 text-red-500 hover:text-red-700">
                    <i class="fas fa-trash text-xs"></i>
                </button>
            `;
            cartItemsContainer.appendChild(cartItem);
        });
    }
    
    updateCartSummary();
}

function increaseQuantity(index) {
    cart[index].quantity += 1;
    updateCartDisplay();
}

function decreaseQuantity(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;
    } else {
        cart.splice(index, 1);
    }
    updateCartDisplay();
    updateCheckoutButton();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
    updateCheckoutButton();
}

function updateCartSummary() {
    const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
    const totalAmount = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    
    document.getElementById('total-quantity').textContent = totalQuantity;
    document.getElementById('total-amount').textContent = 'Rp' + new Intl.NumberFormat('id-ID').format(totalAmount);
}

function updateCheckoutButton() {
    const checkoutBtn = document.getElementById('checkout-btn');
    checkoutBtn.disabled = !selectedCompanyId || cart.length === 0;
}

// Checkout functionality
document.getElementById('checkout-btn').addEventListener('click', function() {
    if (!selectedCompanyId || cart.length === 0) {
        alert('Please select a company and add items to cart');
        return;
    }
    
    // Prepare data for submission
    const orderData = {
        company_id: selectedCompanyId,
        cart: cart
    };
    
    // Submit order via AJAX
    fetch('{{ route("orders.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order created successfully!');
            // Reset form
            cart = [];
            selectedCompanyId = null;
            document.getElementById('company-select').value = '';
            document.getElementById('company-details').classList.add('hidden');
            document.getElementById('cart-company-info').classList.add('hidden');
            updateCartDisplay();
            updateCheckoutButton();
        } else {
            alert('Error creating order');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error creating order');
    });
});
</script>
</x-admin-layout>

@extends('layouts.admin')

@section('title', 'Tambah Transaksi Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Transaksi Baru</h1>
            <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

        <form action="{{ route('transactions.store') }}" method="POST" id="transactionForm">
            @csrf
            
            <!-- Customer Selection -->
            <div class="mb-6">
                <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-2">Customer</label>
                <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Walk-in Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->name_customer }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Method -->
            <div class="mb-6">
                <label for="payment_method_id" class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran *</label>
                <select name="payment_method_id" id="payment_method_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method->payment_method_id }}">{{ $method->name_payment_method }}</option>
                    @endforeach
                </select>
                @error('payment_method_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Products Section -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <label class="block text-sm font-medium text-gray-700">Produk *</label>
                    <button type="button" id="addItem" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-plus mr-1"></i>Tambah Item
                    </button>
                </div>
                
                <div id="itemsContainer">
                    <div class="item-row border border-gray-300 rounded-lg p-4 mb-3">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Produk</label>
                                <select name="items[0][product_id]" class="product-select w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->item_id }}" data-price="{{ $product->sellingprice_item }}" data-stock="{{ $product->stock_item }}">
                                            {{ $product->name_item }} ({{ $product->category->name_category ?? 'N/A' }}) - Stock: {{ $product->stock_item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Qty</label>
                                <input type="number" name="items[0][quantity]" class="quantity-input w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" min="1" value="1" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                <input type="number" name="items[0][price]" class="price-input w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="0.01" required>
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove-item bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded w-full">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <span class="text-sm text-gray-600">Subtotal: Rp <span class="item-subtotal">0</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Discount -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700 mb-2">Diskon (Rp)</label>
                    <input type="number" name="discount" id="discount" value="0" min="0" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('discount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Total Summary -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <div class="flex justify-between items-center text-lg font-semibold">
                    <span>Total Transaksi:</span>
                    <span id="grandTotal">Rp 0</span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-save mr-2"></i>Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let itemIndex = 1;

    // Add new item row
    document.getElementById('addItem').addEventListener('click', function() {
        const container = document.getElementById('itemsContainer');
        const newRow = createItemRow(itemIndex);
        container.insertAdjacentHTML('beforeend', newRow);
        itemIndex++;
        updateEventListeners();
    });

    function createItemRow(index) {
        return `
            <div class="item-row border border-gray-300 rounded-lg p-4 mb-3">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Produk</label>
                        <select name="items[${index}][product_id]" class="product-select w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->item_id }}" data-price="{{ $product->sellingprice_item }}" data-stock="{{ $product->stock_item }}">
                                    {{ $product->name_item }} ({{ $product->category->name_category ?? 'N/A' }}) - Stock: {{ $product->stock_item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Qty</label>
                        <input type="number" name="items[${index}][quantity]" class="quantity-input w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" min="1" value="1" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                        <input type="number" name="items[${index}][price]" class="price-input w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="0.01" required>
                    </div>
                    <div class="flex items-end">
                        <button type="button" class="remove-item bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded w-full">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-sm text-gray-600">Subtotal: Rp <span class="item-subtotal">0</span></span>
                </div>
            </div>
        `;
    }

    function updateEventListeners() {
        // Product selection change
        document.querySelectorAll('.product-select').forEach(select => {
            select.addEventListener('change', function() {
                const option = this.selectedOptions[0];
                const price = option.getAttribute('data-price') || 0;
                const priceInput = this.closest('.item-row').querySelector('.price-input');
                priceInput.value = price;
                calculateItemSubtotal(this.closest('.item-row'));
            });
        });

        // Quantity and price change
        document.querySelectorAll('.quantity-input, .price-input').forEach(input => {
            input.addEventListener('input', function() {
                calculateItemSubtotal(this.closest('.item-row'));
            });
        });

        // Remove item
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', function() {
                if (document.querySelectorAll('.item-row').length > 1) {
                    this.closest('.item-row').remove();
                    calculateGrandTotal();
                }
            });
        });

        // Discount input
        document.getElementById('discount').addEventListener('input', calculateGrandTotal);
    }

    function calculateItemSubtotal(row) {
        const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
        const price = parseFloat(row.querySelector('.price-input').value) || 0;
        const subtotal = quantity * price;
        
        row.querySelector('.item-subtotal').textContent = subtotal.toLocaleString('id-ID');
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        let total = 0;
        
        document.querySelectorAll('.item-row').forEach(row => {
            const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            total += quantity * price;
        });

        const discount = parseFloat(document.getElementById('discount').value) || 0;
        
        const grandTotal = total - discount;
        document.getElementById('grandTotal').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
    }

    // Initialize event listeners
    updateEventListeners();
});
</script>
@endsection

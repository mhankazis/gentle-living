@extends('layouts.admin')

@section('title', 'Edit Transaksi')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Transaksi #{{ $transaction->number }}</h1>
            <div class="space-x-2">
                <a href="{{ route('transactions.show', $transaction->transaction_sales_id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                </a>
                <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>

        <form action="{{ route('transactions.update', $transaction->transaction_sales_id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Transaction Info -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Transaksi</label>
                        <input type="text" value="{{ $transaction->number }}" readonly class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="text" value="{{ $transaction->date->format('d/m/Y H:i') }}" readonly class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kasir</label>
                        <input type="text" value="{{ $transaction->user->name ?? 'N/A' }}" readonly class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100">
                    </div>
                </div>
            </div>

            <!-- Customer Selection -->
            <div class="mb-6">
                <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-2">Customer</label>
                <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Walk-in Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}" {{ $transaction->customer_id == $customer->customer_id ? 'selected' : '' }}>
                            {{ $customer->name_customer }}
                        </option>
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
                        <option value="{{ $method->payment_method_id }}" {{ $transaction->payment_method_id == $method->payment_method_id ? 'selected' : '' }}>
                            {{ $method->name_payment_method }}
                        </option>
                    @endforeach
                </select>
                @error('payment_method_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Transaction Items (Read-only) -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-4">Items Transaksi</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-300">
                                    <th class="text-left py-2">Produk</th>
                                    <th class="text-center py-2">Qty</th>
                                    <th class="text-right py-2">Harga</th>
                                    <th class="text-right py-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->details as $detail)
                                <tr class="border-b border-gray-200">
                                    <td class="py-2">{{ $detail->item->name_item ?? 'N/A' }}</td>
                                    <td class="py-2 text-center">{{ $detail->quantity ?? $detail->qty }}</td>
                                    <td class="py-2 text-right">Rp {{ number_format($detail->price ?? $detail->sell_price, 0, ',', '.') }}</td>
                                    <td class="py-2 text-right">Rp {{ number_format($detail->total ?? $detail->total_amount, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Financial Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700 mb-2">Diskon (Rp)</label>
                    <input type="number" name="discount" id="discount" value="{{ $transaction->discount_amount }}" min="0" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('discount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tax" class="block text-sm font-medium text-gray-700 mb-2">Pajak (Rp)</label>
                    <input type="number" name="tax" id="tax" value="{{ $transaction->tax_amount }}" min="0" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tax')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="paid_amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Dibayar (Rp) *</label>
                    <input type="number" name="paid_amount" id="paid_amount" value="{{ $transaction->paid_amount }}" min="0" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('paid_amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Transaction Summary -->
            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span>Rp {{ number_format($transaction->subtotal_amount ?? $transaction->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Diskon:</span>
                        <span>- Rp {{ number_format($transaction->discount_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Pajak:</span>
                        <span>+ Rp {{ number_format($transaction->tax_amount, 0, ',', '.') }}</span>
                    </div>
                    <hr class="border-gray-300">
                    <div class="flex justify-between text-lg font-semibold">
                        <span>Total:</span>
                        <span>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between {{ $transaction->paid_amount >= $transaction->total_amount ? 'text-green-600' : 'text-red-600' }}">
                        <span>Dibayar:</span>
                        <span>Rp {{ number_format($transaction->paid_amount, 0, ',', '.') }}</span>
                    </div>
                    @if($transaction->paid_amount < $transaction->total_amount)
                    <div class="flex justify-between text-red-600">
                        <span>Sisa:</span>
                        <span>Rp {{ number_format($transaction->total_amount - $transaction->paid_amount, 0, ',', '.') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Transaksi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

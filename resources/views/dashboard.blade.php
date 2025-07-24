@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Beranda</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center mb-8">
            <i class="fas fa-th-large mr-3 text-xl"></i>
            <h1 class="text-2xl font-bold text-gray-800">Beranda</h1>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Invoice Terbayar -->
            <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-file-invoice-dollar mr-2"></i>
                            <span class="text-sm font-medium">Total Invoice Terbayar</span>
                        </div>
                        <div class="text-3xl font-bold">Rp {{ number_format($totalPaidInvoices ?? 0, 0, ',', '.') }}</div>
                        <div class="text-xs text-purple-200 mt-1">
                            Data dari transaksi yang sudah lunas
                        </div>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-20">
                    <i class="fas fa-chart-line text-6xl"></i>
                </div>
            </div>

            <!-- Total Invoice Belum Terbayar -->
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl p-6 text-white relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span class="text-sm font-medium">Total Invoice Belum Terbayar</span>
                        </div>
                        <div class="text-3xl font-bold">Rp {{ number_format($totalUnpaidInvoices ?? 0, 0, ',', '.') }}</div>
                        <div class="text-xs text-pink-200 mt-1">
                            Sisa tagihan yang belum dibayar
                        </div>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-20">
                    <i class="fas fa-clock text-6xl"></i>
                </div>
            </div>

            <!-- Pesanan Belum Diproses -->
            <a href="#pending-orders" class="block bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl p-6 text-white relative overflow-hidden hover:from-yellow-500 hover:to-yellow-600 transition-all duration-200 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span class="text-sm font-medium">Transaksi Belum Lunas</span>
                        </div>
                        <div class="text-3xl font-bold">{{ count($pendingOrdersList ?? []) }}</div>
                        <div class="text-xs text-yellow-200 mt-1">
                            Transaksi yang belum dibayar penuh - Lihat detail di bawah
                        </div>
                    </div>
                    <div class="text-yellow-200">
                        <i class="fas fa-chevron-down text-xl"></i>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-20">
                    <i class="fas fa-money-bill-wave text-6xl"></i>
                </div>
            </a>
        </div>

        <!-- Data Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- 5 Items Teratas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">5 Items Teratas</h2>
                    <p class="text-sm text-gray-600 mt-1">Berdasarkan jumlah terjual</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty Terjual</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($topProducts as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center justify-center w-6 h-6 bg-green-100 text-green-800 text-xs font-bold rounded-full">
                                        {{ $product->rank }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                        {{ number_format($product->total_qty, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Rp {{ number_format($product->total_value, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-box text-3xl text-gray-300 mb-2"></i>
                                        <p>Tidak ada data item</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 5 Items Paling Rendah -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">5 Items Paling Rendah</h2>
                    <p class="text-sm text-gray-600 mt-1">Berdasarkan jumlah terjual</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty Terjual</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($bottomProducts as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center justify-center w-6 h-6 bg-red-100 text-red-800 text-xs font-bold rounded-full">
                                        {{ $product->rank }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                                        {{ number_format($product->total_qty, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Rp {{ number_format($product->total_value, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-box text-3xl text-gray-300 mb-2"></i>
                                        <p>Tidak ada data item</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pending Orders Table -->
        <div id="pending-orders" class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Transaksi Belum Lunas</h2>
                        <p class="text-sm text-gray-600 mt-1">Transaksi yang belum dibayar penuh</p>
                    </div>
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full font-medium">
                        {{ count($pendingOrdersList ?? []) }} transaksi
                    </span>
                </div>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Show</span>
                        <select class="border border-gray-300 rounded px-3 py-1 text-sm">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                        <span class="text-sm text-gray-600">entries</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Search:</span>
                        <input type="text" class="border border-gray-300 rounded px-3 py-1 text-sm" placeholder="">
                    </div>
                </div>
                
                <!-- Table Header -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Transaksi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Item</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sisa Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pendingOrdersList as $order)
                                @foreach($order['items'] as $index => $item)
                                <tr class="hover:bg-gray-50">
                                    @if($index === 0)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 font-medium" rowspan="{{ count($order['items']) }}">{{ $order['no'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">{{ $order['date'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-600 font-medium" rowspan="{{ count($order['items']) }}">{{ $order['number'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">{{ $order['customer'] }}</td>
                                    @endif
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item['name'] }}</td>
                                    @if($index === 0)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">
                                            @if($order['status'] === 'Belum Lunas')
                                                <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                                    Belum Lunas
                                                </span>
                                            @elseif($order['status'] === 'Partial')
                                                <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    Partial
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    Lunas
                                                </span>
                                            @endif
                                        </td>
                                    @endif
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                            {{ number_format($item['qty'], 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                    @if($index === 0)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">
                                            <div class="text-right">
                                                <div class="text-sm font-semibold text-red-600">Rp {{ number_format($order['remaining'] ?? ($order['total_amount'] - ($order['paid_amount'] ?? 0)), 0, ',', '.') }}</div>
                                                @if(isset($order['paid_amount']) && $order['paid_amount'] > 0)
                                                    <div class="text-xs text-gray-500">
                                                        Sudah bayar: Rp {{ number_format($order['paid_amount'], 0, ',', '.') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-12 text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-check-circle text-4xl text-green-300 mb-4"></i>
                                        <p class="text-lg font-medium">Semua transaksi sudah lunas!</p>
                                        <p class="text-sm">Tidak ada transaksi yang belum dibayar penuh</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Info -->
                <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                    <div>Showing {{ count($pendingOrdersList) > 0 ? '1' : '0' }} to {{ count($pendingOrdersList) }} of {{ count($pendingOrdersList) }} entries</div>
                    <div class="flex space-x-2">
                        @if(count($pendingOrdersList) > 10)
                            <button class="px-3 py-1 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">Previous</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-gray-700 hover:bg-gray-50">Next</button>
                        @else
                            <button class="px-3 py-1 border border-gray-300 rounded text-gray-500 cursor-not-allowed">Previous</button>
                            <button class="px-3 py-1 border border-gray-300 rounded text-gray-500 cursor-not-allowed">Next</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Cards Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Data Items/Produk -->
            <a href="{{ route('products.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Items</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola data master items/produk seperti menambah, memperbarui, atau menghapus data produk.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-2xl text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Transaksi Penjualan -->
            <a href="{{ route('transactions.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Transaksi Penjualan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola data transaksi penjualan dan detail transaksi sales.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cash-register text-2xl text-green-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Pesanan -->
            <a href="{{ route('orders.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Pesanan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola pemesanan produk dan status pemrosesan pesanan.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clipboard-list text-2xl text-yellow-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Customers -->
            <a href="{{ route('companies.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Customers</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola data master customers/pelanggan seperti menambah, mengubah, memperbarui data pelanggan.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Users/Admin -->
            <a href="{{ route('admins.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Users</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola data master users/admin sistem dan pengaturan akses pengguna.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-shield text-2xl text-red-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Invoice -->
            <a href="{{ route('invoices.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Invoice</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Mengelola data invoice penjualan dan status pembayaran pelanggan.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-invoice text-2xl text-indigo-600"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Final Footer -->
        <div class="mt-12 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>

    <!-- JavaScript for smooth scroll to pending orders -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click on pending orders card
            const pendingOrdersCard = document.querySelector('a[href="#pending-orders"]');
            if (pendingOrdersCard) {
                pendingOrdersCard.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.getElementById('pending-orders');
                    if (target) {
                        target.scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                        
                        // Add highlight effect
                        target.classList.add('ring-4', 'ring-yellow-200');
                        setTimeout(() => {
                            target.classList.remove('ring-4', 'ring-yellow-200');
                        }, 2000);
                    }
                });
            }
        });
    </script>
@endsection

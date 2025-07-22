<x-admin-layout>
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
                        <div class="text-3xl font-bold">Rp {{ number_format($totalPaidInvoices, 0, ',', '.') }}</div>
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
                        <div class="text-3xl font-bold">Rp {{ number_format($totalUnpaidInvoices, 0, ',', '.') }}</div>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-20">
                    <i class="fas fa-clock text-6xl"></i>
                </div>
            </div>

            <!-- Pesanan Belum Diproses -->
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-xl p-6 text-white relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            <span class="text-sm font-medium">Pesanan Belum Diproses</span>
                        </div>
                        <div class="text-3xl font-bold">{{ $pendingOrders }}</div>
                    </div>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-20">
                    <i class="fas fa-box text-6xl"></i>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- 5 Produk Teratas -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">5 Produk Teratas</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($topProducts as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->rank }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->total_qty }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($product->total_value, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    Tidak ada data produk
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 5 Produk Paling Terbawah -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">5 Produk Paling Terbawah</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peringkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($bottomProducts as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->rank }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->total_qty }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($product->total_value, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    Tidak ada data produk
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pending Orders Table -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Daftar pesanan belum selesai diproses</h2>
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
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Transaksi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Transaksi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Perusahaan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Proses</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($pendingOrdersList as $order)
                                @foreach($order['items'] as $index => $item)
                                <tr>
                                    @if($index === 0)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">{{ $order['no'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">{{ $order['date'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-600 font-medium" rowspan="{{ count($order['items']) }}">{{ $order['number'] }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">{{ $order['customer'] }}</td>
                                    @endif
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item['name'] }}</td>
                                    @if($index === 0)
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900" rowspan="{{ count($order['items']) }}">
                                            <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                {{ $order['status'] }}
                                            </span>
                                        </td>
                                    @endif
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item['qty'] }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-12 text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-clipboard-list text-4xl text-gray-300 mb-4"></i>
                                        <p>Tidak ada pesanan yang belum diproses</p>
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
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Data Produk -->
            <a href="{{ route('products.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Produk</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Fitur ini digunakan untuk mengelola data produk seperti menambah, memperbarui, atau menghapus data produk.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-2xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Transaksi -->
            <a href="{{ route('transactions.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Transaksi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Fitur ini digunakan untuk mengelola data transaksi seperti memperbarui data transaksi.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-exchange-alt text-2xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Pemesanan Produk -->
            <a href="{{ route('orders.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pemesanan Produk</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Pemesanan produk merupakan fitur yang digunakan untuk melakukan pemesanan produk.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clipboard-list text-2xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Pelanggan -->
            <a href="{{ route('companies.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Pelanggan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Fitur ini digunakan untuk mengelola data pelanggan seperti menambah, mengubah, memperbarui data pelanggan.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-gray-600"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Data Admin -->
            <a href="{{ route('admins.index') }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-8 hover:shadow-md transition-shadow duration-200 cursor-pointer">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Data Admin</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Fitur ini digunakan untuk mengelola data admin seperti
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-shield text-2xl text-gray-600"></i>
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
                            Fitur ini digunakan untuk mengelola data invoice.
                        </p>
                    </div>
                    <div class="ml-6 flex-shrink-0">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-invoice text-2xl text-gray-600"></i>
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
</x-admin-layout>

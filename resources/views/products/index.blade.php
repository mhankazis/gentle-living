<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Data Produk</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-box mr-3 text-xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Data Produk</h1>
            </div>
            <a href="{{ route('products.create') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Produk
            </a>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
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
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">HPP</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran Volume</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Is Cashback</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Cashback</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->item_id }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $product->name_item }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($product->costprice_item, 0, ',', '.') }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->netweight_item ?? '-' }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="text-red-600">Tidak</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 0</td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.show', $product->item_id) }}" 
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->item_id) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                           title="Edit Produk">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->item_id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                                    title="Hapus Produk"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-12 text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fas fa-box text-4xl text-gray-300 mb-4"></i>
                                        <p>Tidak ada data produk</p>
                                        <a href="{{ route('products.create') }}" class="mt-2 text-blue-500 hover:text-blue-700">
                                            Tambah produk pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                    <div>
                        Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} entries
                    </div>
                    <div class="flex space-x-1">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>
</x-admin-layout>

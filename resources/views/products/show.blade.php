<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-700">Data Produk</a>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Detail Produk</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-eye mr-3 text-xl text-blue-600"></i>
                <h1 class="text-2xl font-bold text-gray-800">Detail Produk</h1>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('products.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <a href="{{ route('products.edit', $product->item_id) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Produk
                </a>
            </div>
        </div>

        <!-- Product Detail Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-8">
                <!-- Product Header -->
                <div class="border-b border-gray-200 pb-6 mb-8">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name_item }}</h2>
                            <p class="text-lg text-gray-600">ID: {{ $product->item_id }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500 mb-1">Harga Pokok Produksi</div>
                            <div class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($product->costprice_item, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Information Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Description -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-align-left mr-2 text-blue-500"></i>
                                Deskripsi Produk
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $product->description_item ?: 'Tidak ada deskripsi tersedia.' }}
                            </p>
                        </div>

                        <!-- Ingredients -->
                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-leaf mr-2 text-green-500"></i>
                                Ingredients/Bahan
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $product->ingredient_item ?: 'Tidak ada informasi bahan tersedia.' }}
                            </p>
                        </div>

                        <!-- Contains -->
                        <div class="bg-purple-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-list-ul mr-2 text-purple-500"></i>
                                Kandungan/Isi Produk
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $product->contain_item ?: 'Tidak ada informasi kandungan tersedia.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Product Specifications -->
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-indigo-500"></i>
                                Spesifikasi Produk
                            </h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">ID Produk</span>
                                    <span class="text-gray-900 font-semibold">{{ $product->item_id }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">Berat Bersih</span>
                                    <span class="text-gray-900 font-semibold">{{ $product->netweight_item ?: '-' }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">Kategori</span>
                                    <span class="text-gray-900 font-semibold">
                                        @switch($product->category_id)
                                            @case(1)
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Essential Oil</span>
                                                @break
                                            @case(2)
                                                <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded-full text-xs">Baby Care</span>
                                                @break
                                            @case(3)
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Health Care</span>
                                                @break
                                            @case(4)
                                                <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">Beauty Care</span>
                                                @break
                                            @default
                                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">Tidak ada kategori</span>
                                        @endswitch
                                    </span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600 font-medium">Status</span>
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Price Information -->
                        <div class="bg-yellow-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-dollar-sign mr-2 text-yellow-500"></i>
                                Informasi Harga
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Harga Pokok Produksi (HPP)</span>
                                    <span class="text-xl font-bold text-green-600">
                                        Rp {{ number_format($product->costprice_item, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>Harga per unit berdasarkan biaya produksi</span>
                                </div>
                            </div>
                        </div>

                        <!-- Timestamps -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-clock mr-2 text-gray-500"></i>
                                Informasi Waktu
                            </h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Dibuat pada</span>
                                    <span class="text-gray-900">{{ $product->created_at ? $product->created_at->format('d/m/Y H:i') : '-' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Terakhir diupdate</span>
                                    <span class="text-gray-900">{{ $product->updated_at ? $product->updated_at->format('d/m/Y H:i') : '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-8 border-t border-gray-200">
                    <a href="{{ route('products.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar
                    </a>
                    <a href="{{ route('products.edit', $product->item_id) }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Produk
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>
</x-admin-layout>

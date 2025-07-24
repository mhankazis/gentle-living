@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-700">Data Produk</a>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Edit Produk</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-edit mr-3 text-xl text-blue-600"></i>
                <h1 class="text-2xl font-bold text-gray-800">Edit Produk</h1>
            </div>
            <a href="{{ route('products.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-8">
                <form action="{{ route('products.update', $product->item_id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div>
                        <label for="name_item" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-2 text-blue-500"></i>
                            Nama Produk
                        </label>
                        <input type="text" 
                               id="name_item" 
                               name="name_item" 
                               value="{{ old('name_item', $product->name_item) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name_item') border-red-300 @enderror"
                               placeholder="Masukkan nama produk..."
                               required>
                        @error('name_item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Description -->
                    <div>
                        <label for="description_item" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-green-500"></i>
                            Deskripsi Produk
                        </label>
                        <textarea id="description_item" 
                                  name="description_item" 
                                  rows="4"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description_item') border-red-300 @enderror"
                                  placeholder="Masukkan deskripsi produk...">{{ old('description_item', $product->description_item) }}</textarea>
                        @error('description_item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Ingredients -->
                    <div>
                        <label for="ingredient_item" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-leaf mr-2 text-green-500"></i>
                            Ingredients/Bahan
                        </label>
                        <textarea id="ingredient_item" 
                                  name="ingredient_item" 
                                  rows="3"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('ingredient_item') border-red-300 @enderror"
                                  placeholder="Masukkan bahan-bahan produk...">{{ old('ingredient_item', $product->ingredient_item) }}</textarea>
                        @error('ingredient_item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Two Column Layout for Price and Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Cost Price -->
                        <div>
                            <label for="costprice_item" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-dollar-sign mr-2 text-yellow-500"></i>
                                Harga Pokok Produksi (HPP)
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500 text-sm">Rp</span>
                                <input type="number" 
                                       id="costprice_item" 
                                       name="costprice_item" 
                                       value="{{ old('costprice_item', $product->costprice_item) }}"
                                       class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('costprice_item') border-red-300 @enderror"
                                       placeholder="0"
                                       min="0"
                                       step="0.01"
                                       required>
                            </div>
                            @error('costprice_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Net Weight -->
                        <div>
                            <label for="netweight_item" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-weight mr-2 text-purple-500"></i>
                                Berat Bersih
                            </label>
                            <input type="text" 
                                   id="netweight_item" 
                                   name="netweight_item" 
                                   value="{{ old('netweight_item', $product->netweight_item) }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('netweight_item') border-red-300 @enderror"
                                   placeholder="Contoh: 100ml, 50gr, dll">
                            @error('netweight_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Product Contains -->
                    <div>
                        <label for="contain_item" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-list-ul mr-2 text-indigo-500"></i>
                            Kandungan/Isi Produk
                        </label>
                        <textarea id="contain_item" 
                                  name="contain_item" 
                                  rows="3"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('contain_item') border-red-300 @enderror"
                                  placeholder="Masukkan kandungan atau isi produk...">{{ old('contain_item', $product->contain_item) }}</textarea>
                        @error('contain_item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-folder mr-2 text-orange-500"></i>
                            Kategori Produk
                        </label>
                        <select id="category_id" 
                                name="category_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-300 @enderror">
                            <option value="">Pilih Kategori</option>
                            <option value="1" {{ old('category_id', $product->category_id) == 1 ? 'selected' : '' }}>Essential Oil</option>
                            <option value="2" {{ old('category_id', $product->category_id) == 2 ? 'selected' : '' }}>Baby Care</option>
                            <option value="3" {{ old('category_id', $product->category_id) == 3 ? 'selected' : '' }}>Health Care</option>
                            <option value="4" {{ old('category_id', $product->category_id) == 4 ? 'selected' : '' }}>Beauty Care</option>
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('products.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Update Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <a href="{{ route('products.index') }}" class="hover:text-gray-900">Data Produk</a>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Tambah Produk</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center mb-8">
            <i class="fas fa-plus mr-3 text-xl"></i>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Produk</h1>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="p-6">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name_item" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                            <input type="text" 
                                   id="name_item" 
                                   name="name_item" 
                                   value="{{ old('name_item') }}" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('name_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cost Price -->
                        <div>
                            <label for="costprice_item" class="block text-sm font-medium text-gray-700 mb-2">Harga Modal</label>
                            <input type="number" 
                                   id="costprice_item" 
                                   name="costprice_item" 
                                   value="{{ old('costprice_item') }}" 
                                   required
                                   min="0"
                                   step="0.01"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('costprice_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Selling Price -->
                        <div>
                            <label for="sellingprice_item" class="block text-sm font-medium text-gray-700 mb-2">Harga Jual</label>
                            <input type="number" 
                                   id="sellingprice_item" 
                                   name="sellingprice_item" 
                                   value="{{ old('sellingprice_item') }}" 
                                   required
                                   min="0"
                                   step="0.01"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('sellingprice_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock_item" class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                            <input type="number" 
                                   id="stock_item" 
                                   name="stock_item" 
                                   value="{{ old('stock_item') }}" 
                                   required
                                   min="0"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('stock_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select id="category_id" 
                                    name="category_id" 
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih Kategori</option>
                                @if(isset($categories) && $categories->count() > 0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->name_category }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Pakaian Bayi</option>
                                    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>Perlengkapan Mandi</option>
                                    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>Mainan Bayi</option>
                                    <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>Peralatan Makan</option>
                                    <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>Perlengkapan Tidur</option>
                                @endif
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="is_active" 
                                    name="is_active" 
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Unit -->
                        <div>
                            <label for="unit_item" class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
                            <select id="unit_item" 
                                    name="unit_item" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Pilih Satuan</option>
                                <option value="pcs" {{ old('unit_item') == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                <option value="kg" {{ old('unit_item') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                <option value="liter" {{ old('unit_item') == 'liter' ? 'selected' : '' }}>Liter</option>
                                <option value="box" {{ old('unit_item') == 'box' ? 'selected' : '' }}>Box</option>
                                <option value="pack" {{ old('unit_item') == 'pack' ? 'selected' : '' }}>Pack</option>
                                <option value="set" {{ old('unit_item') == 'set' ? 'selected' : '' }}>Set</option>
                            </select>
                            @error('unit_item')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <label for="description_item" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Produk</label>
                        <textarea id="description_item" 
                                  name="description_item" 
                                  rows="4"
                                  placeholder="Masukkan deskripsi produk..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description_item') }}</textarea>
                        @error('description_item')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4 mt-8">
                        <a href="{{ route('products.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                            Simpan Produk
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

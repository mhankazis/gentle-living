<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <a href="{{ route('companies.index') }}" class="text-blue-500 hover:text-blue-700">Data Perusahaan</a>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Edit Perusahaan</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-edit mr-3 text-xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Edit Perusahaan</h1>
            </div>
            <a href="{{ route('companies.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border">
            <div class="p-6">
                <form method="POST" action="{{ route('companies.update', $company) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Company Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $company->name) }}"
                                   required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Owner Name -->
                        <div>
                            <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Pemilik <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="owner_name" 
                                   name="owner_name" 
                                   value="{{ old('owner_name', $company->owner_name) }}"
                                   required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('owner_name') border-red-500 @enderror">
                            @error('owner_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $company->email) }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon
                            </label>
                            <input type="text" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone', $company->phone) }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat <span class="text-red-500">*</span>
                            </label>
                            <textarea id="address" 
                                      name="address" 
                                      rows="3"
                                      required
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $company->address) }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-4 mt-8 pt-6 border-t">
                        <a href="{{ route('companies.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

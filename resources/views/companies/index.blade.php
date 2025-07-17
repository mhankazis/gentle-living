<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Data Perusahaan</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-building mr-3 text-xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Data Perusahaan</h1>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-lg shadow-sm border">
            <!-- Card Header -->
            <div class="p-6 border-b">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Add Company Button -->
                        <a href="{{ route('companies.create') }}" 
                           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Perusahaan
                        </a>

                        <!-- Show entries dropdown -->
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Show</span>
                            <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-600">entries</span>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Search:</span>
                        <form method="GET" action="{{ route('companies.index') }}" class="flex">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search companies..."
                                   class="border border-gray-300 rounded-l px-3 py-1 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-r text-sm">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pemilik</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($companies as $company)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->email ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">{{ $company->address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->phone ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $company->owner_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('companies.edit', $company) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <button onclick="deleteCompany({{ $company->id }})" 
                                            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <i class="fas fa-building text-4xl text-gray-300 mb-4"></i>
                                    <p>No companies found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            @if($companies->hasPages())
            <div class="px-6 py-3 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} entries
                    </div>
                    <div class="flex space-x-1">
                        {{ $companies->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
            @else
            <div class="px-6 py-3 border-t border-gray-200 bg-gray-50">
                <div class="text-sm text-gray-600">
                    Showing {{ $companies->count() }} of {{ $companies->count() }} entries
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
            <div class="text-center">
                <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Delete Company</h3>
                <p class="text-gray-600 mb-6">Are you sure you want to delete this company? This action cannot be undone.</p>
                <div class="flex justify-center space-x-4">
                    <button onclick="closeDeleteModal()" 
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteCompany(id) {
            document.getElementById('deleteForm').action = `/companies/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        // Show success/error messages
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif

        @if(session('error'))
            alert('{{ session('error') }}');
        @endif
    </script>
</x-admin-layout>

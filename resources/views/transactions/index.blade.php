<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Data Transaksi</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center mb-8">
            <i class="fas fa-exchange-alt mr-3 text-xl"></i>
            <h1 class="text-2xl font-bold text-gray-800">Data Transaksi</h1>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
            <div class="p-6">
                <form method="GET" action="{{ route('transactions.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Show entries -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Show :</label>
                        <select name="per_page" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                        </select>
                    </div>

                    <!-- Search -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Search :</label>
                        <select name="search_type" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="kode_transaksi" {{ request('search_type') == 'kode_transaksi' ? 'selected' : '' }}>Kode Transaksi</option>
                            <option value="nama_perusahaan" {{ request('search_type') == 'nama_perusahaan' ? 'selected' : '' }}>Nama Perusahaan</option>
                        </select>
                    </div>

                    <!-- Date Range -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Tanggal Transaksi :</label>
                        <input type="text" 
                               name="date_range" 
                               value="{{ request('date_range', '25-07-17 - 25-07-17') }}"
                               class="w-full border border-gray-300 rounded px-3 py-2 text-sm"
                               placeholder="DD-MM-YY - DD-MM-YY">
                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition-colors duration-200">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                                <i class="fas fa-sort ml-1"></i>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kode Transaksi
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Transaksi
                                <i class="fas fa-sort ml-1"></i>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Perusahaan
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->id }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">{{ $transaction->kode_transaksi }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->tanggal_transaksi->format('d-m-Y') }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->nama_perusahaan }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-12 text-gray-500">
                                No data available in table
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex justify-between items-center text-sm text-gray-600">
                    <div>
                        Showing {{ $transactions->firstItem() ?? 0 }} to {{ $transactions->lastItem() ?? 0 }} of {{ $transactions->total() }} entries
                    </div>
                    <div class="flex space-x-1">
                        {{ $transactions->appends(request()->query())->links('pagination::bootstrap-4') }}
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

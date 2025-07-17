<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Data Invoice</span>
        </div>

        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-file-invoice mr-3 text-xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Data Invoice</h1>
            </div>
            <a href="{{ route('invoices.create') }}" 
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Invoice
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
            <div class="p-6">
                <form method="GET" action="{{ route('invoices.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                    <!-- Show entries -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Tampilkan :</label>
                        <select name="per_page" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                        </select>
                    </div>

                    <!-- Kode Invoice -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Kode Invoice :</label>
                        <input type="text" 
                               name="kode_invoice" 
                               value="{{ request('kode_invoice') }}"
                               placeholder="Masukkan kode invoice"
                               class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                    </div>

                    <!-- Status Pelunasan -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Status Pelunasan :</label>
                        <select name="status_pelunasan" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="semua" {{ request('status_pelunasan') == 'semua' ? 'selected' : '' }}>semua</option>
                            <option value="paid" {{ request('status_pelunasan') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ request('status_pelunasan') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="partial" {{ request('status_pelunasan') == 'partial' ? 'selected' : '' }}>Partial</option>
                        </select>
                    </div>

                    <!-- Status DP -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Status Dp :</label>
                        <select name="status_dp" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="semua" {{ request('status_dp') == 'semua' ? 'selected' : '' }}>semua</option>
                            <option value="paid" {{ request('status_dp') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ request('status_dp') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="not_required" {{ request('status_dp') == 'not_required' ? 'selected' : '' }}>Not Required</option>
                        </select>
                    </div>

                    <!-- Apply Button -->
                    <div>
                        <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded text-sm transition-colors duration-200">
                            Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Invoices Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Invoice</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perusahaan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nominal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pelunasan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nominal DP</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jatuh Tempo DP</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Dp</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($invoices as $invoice)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $invoice->id }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">{{ $invoice->invoice_number }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                @if($invoice->user)
                                    {{ $invoice->user->name }}
                                @else
                                    @if($invoice->id == 4) Pabrik Teknologi
                                    @elseif($invoice->id == 3) CV Berkah Jaya
                                    @elseif($invoice->id == 2) Pabrik Teknologi
                                    @elseif($invoice->id == 1) CV Berkah Jaya
                                    @else Unknown Company
                                    @endif
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp{{ number_format($invoice->amount, 0, ',', '.') }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $invoice->due_date->format('Y-m-d') }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @if($invoice->status === 'paid')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Paid
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Unpaid
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp0</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="relative">
                                    <button class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200 flex items-center"
                                            onclick="toggleDropdown({{ $invoice->id }})">
                                        Aksi <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                    <div id="dropdown-{{ $invoice->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 border">
                                        <a href="{{ route('invoices.show', $invoice) }}" 
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-eye mr-2"></i>View
                                        </a>
                                        <a href="{{ route('invoices.edit', $invoice) }}" 
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-edit mr-2"></i>Edit
                                        </a>
                                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash mr-2"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-12 text-gray-500">
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
                        Showing {{ $invoices->firstItem() ?? 0 }} to {{ $invoices->lastItem() ?? 0 }} of {{ $invoices->total() }} entries
                    </div>
                    <div class="flex space-x-1">
                        {{ $invoices->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById('dropdown-' + id);
            dropdown.classList.toggle('hidden');
            
            // Close other dropdowns
            document.querySelectorAll('[id^="dropdown-"]').forEach(function(el) {
                if (el.id !== 'dropdown-' + id) {
                    el.classList.add('hidden');
                }
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[onclick^="toggleDropdown"]')) {
                document.querySelectorAll('[id^="dropdown-"]').forEach(function(el) {
                    el.classList.add('hidden');
                });
            }
        });
    </script>
</x-admin-layout>

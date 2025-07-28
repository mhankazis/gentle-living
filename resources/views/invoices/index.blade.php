@extends('layouts.admin')

@section('title', 'Data Invoice')

@section('content')
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

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        @if(session('info'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('info') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-blue-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none'">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif

        <!-- Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
            <div class="p-6">
                <form method="GET" action="{{ route('invoices.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
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
                        <label class="block text-sm text-gray-600 mb-1">Status Pembayaran :</label>
                        <select name="status_pelunasan" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                            <option value="" {{ request('status_pelunasan') == '' ? 'selected' : '' }}>Semua</option>
                            <option value="paid" {{ request('status_pelunasan') == 'paid' ? 'selected' : '' }}>Lunas</option>
                            <option value="unpaid" {{ request('status_pelunasan') == 'unpaid' ? 'selected' : '' }}>Belum Bayar</option>
                            <option value="partial" {{ request('status_pelunasan') == 'partial' ? 'selected' : '' }}>Partial</option>
                        </select>
                    </div>

                    <!-- Apply Button -->
                    <div>
                        <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded text-sm transition-colors duration-200">
                            <i class="fas fa-search mr-1"></i>
                            Filter
                        </button>
                        <a href="{{ route('invoices.index') }}" class="ml-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm transition-colors duration-200">
                            <i class="fas fa-refresh mr-1"></i>
                            Reset
                        </a>
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
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Invoice</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paid Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($invoices as $index => $invoice)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ ($invoices->currentPage() - 1) * $invoices->perPage() + $index + 1 }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">{{ $invoice->number }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $invoice->date ? $invoice->date->format('d/m/Y') : '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $invoice->customer->name_customer ?? 'Walk-in Customer' }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                Rp {{ number_format($invoice->paid_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                @if($invoice->paid_amount >= $invoice->total_amount)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Lunas
                                    </span>
                                @elseif($invoice->paid_amount > 0)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i>
                                        Partial
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        Belum Bayar
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                    {{ $invoice->paymentMethod->name_payment_method ?? 'Cash' }}
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('transactions.invoice', $invoice->transaction_sales_id) }}" 
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                       title="Lihat Invoice">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>
                                    @if($invoice->paid_amount < $invoice->total_amount)
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                            onclick="updatePayment({{ $invoice->transaction_sales_id }})"
                                            title="Update Pembayaran">
                                        <i class="fas fa-money-bill"></i>
                                    </button>
                                    @endif
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition-colors duration-200"
                                            onclick="deleteInvoice({{ $invoice->transaction_sales_id }}, '{{ $invoice->number }}')"
                                            title="Hapus Invoice">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-12 text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-file-invoice text-4xl text-gray-300 mb-4"></i>
                                    <p>Tidak ada data invoice ditemukan</p>
                                    <a href="{{ route('transactions.create') }}" class="mt-2 text-blue-500 hover:text-blue-700">
                                        Buat transaksi baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($invoices->hasPages())
                {{ $invoices->appends(request()->query())->links('custom-pagination') }}
            @else
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="text-center text-sm text-gray-600">
                        Menampilkan {{ $invoices->total() }} data
                    </div>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            Copyright ©2025, Gentle Baby
        </div>
    </div>

    <script>
        function updatePayment(transactionId) {
            // Redirect to payment update page or show modal
            window.location.href = `/transactions/${transactionId}/payment`;
        }

        function deleteInvoice(transactionId, invoiceNumber) {
            // Show confirmation dialog
            if (confirm(`Apakah Anda yakin ingin menghapus invoice ${invoiceNumber}? Tindakan ini tidak dapat dibatalkan.`)) {
                // Create form for DELETE request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/invoices/${transactionId}`;
                
                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                // Add DELETE method
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                // Submit form
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Auto-refresh every 30 seconds for real-time updates
        setInterval(function() {
            if (document.querySelector('[name="kode_invoice"]').value === '' && 
                document.querySelector('[name="status_pelunasan"]').value === '') {
                location.reload();
            }
        }, 30000);
    </script>
@endsection

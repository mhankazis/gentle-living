<x-admin-layout>
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-600 mb-6">
            <i class="fas fa-th-large mr-2"></i>
            <span class="mr-2">Gentle Baby</span>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <a href="{{ route('transactions.index') }}" class="text-blue-500 hover:text-blue-700">Data Transaksi</a>
            <i class="fas fa-chevron-right mr-2 text-xs"></i>
            <span>Invoice</span>
        </div>

        <!-- Page Title and Actions -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i class="fas fa-file-invoice mr-3 text-xl"></i>
                <h1 class="text-2xl font-bold text-gray-800">Invoice #{{ $transaction->number }}</h1>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('transactions.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <button onclick="window.print()" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-200">
                    <i class="fas fa-print mr-2"></i>
                    Print
                </button>
            </div>
        </div>

        <!-- Invoice Content -->
        <div class="bg-white rounded-lg shadow-sm border" id="invoice-content">
            <!-- Invoice Header -->
            <div class="p-8 border-b">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Company Info -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $transaction->branch->company->name_company ?? 'Gentle Baby' }}</h2>
                        <div class="text-gray-600 space-y-1">
                            <p><i class="fas fa-map-marker-alt mr-2"></i>{{ $transaction->branch->address_branch ?? $transaction->branch->company->address_company ?? 'Alamat tidak tersedia' }}</p>
                            <p><i class="fas fa-phone mr-2"></i>{{ $transaction->branch->phone_branch ?? $transaction->branch->company->phone_company ?? 'Telepon tidak tersedia' }}</p>
                        </div>
                    </div>
                    
                    <!-- Invoice Info -->
                    <div class="text-right">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">INVOICE</h3>
                        <div class="space-y-2 text-gray-700">
                            <div class="flex justify-between">
                                <span class="font-medium">No. Invoice:</span>
                                <span>{{ $transaction->number }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium">Tanggal:</span>
                                <span>{{ $transaction->date->format('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium">Waktu:</span>
                                <span>{{ $transaction->date->format('H:i:s') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium">Kasir:</span>
                                <span>{{ $transaction->user->name ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="p-8 bg-gray-50 border-b">
                <h4 class="font-semibold text-gray-900 mb-3">Informasi Pelanggan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-700"><span class="font-medium">Nama:</span> {{ $transaction->customer->name_customer ?? 'Walk-in Customer' }}</p>
                        <p class="text-gray-700"><span class="font-medium">Telepon:</span> {{ $transaction->customer->phone_customer ?? $transaction->whatsapp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700"><span class="font-medium">Alamat:</span> {{ $transaction->customer->address_customer ?? '-' }}</p>
                        <p class="text-gray-700"><span class="font-medium">Tipe:</span> {{ $transaction->customer->customerType->name_customer_type ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="p-8">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-3 font-semibold text-gray-900">Item</th>
                            <th class="text-center py-3 font-semibold text-gray-900">Qty</th>
                            <th class="text-right py-3 font-semibold text-gray-900">Harga Satuan</th>
                            <th class="text-right py-3 font-semibold text-gray-900">Subtotal</th>
                            <th class="text-right py-3 font-semibold text-gray-900">Diskon</th>
                            <th class="text-right py-3 font-semibold text-gray-900">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaction->details as $detail)
                        <tr class="border-b border-gray-100">
                            <td class="py-4">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $detail->item->name_item ?? 'Item tidak ditemukan' }}</p>
                                    <p class="text-sm text-gray-600">{{ $detail->item->description_item ?? '' }}</p>
                                </div>
                            </td>
                            <td class="py-4 text-center text-gray-700">{{ $detail->qty }}</td>
                            <td class="py-4 text-right text-gray-700">Rp {{ number_format($detail->sell_price, 0, ',', '.') }}</td>
                            <td class="py-4 text-right text-gray-700">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            <td class="py-4 text-right text-gray-700">
                                @if($detail->discount_percentage > 0)
                                    {{ $detail->discount_percentage }}%<br>
                                    <span class="text-sm">(-Rp {{ number_format($detail->discount_amount, 0, ',', '.') }})</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-4 text-right font-semibold text-gray-900">Rp {{ number_format($detail->total_amount, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Invoice Summary -->
            <div class="p-8 bg-gray-50 border-t">
                <div class="flex justify-end">
                    <div class="w-full max-w-sm space-y-3">
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($transaction->subtotal, 0, ',', '.') }}</span>
                        </div>
                        @if($transaction->discount_percentage > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Diskon ({{ $transaction->discount_percentage }}%):</span>
                            <span>-Rp {{ number_format($transaction->discount_amount, 0, ',', '.') }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-xl font-bold text-gray-900 border-t pt-3">
                            <span>Total:</span>
                            <span>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Dibayar:</span>
                            <span>Rp {{ number_format($transaction->paid_amount, 0, ',', '.') }}</span>
                        </div>
                        @if($transaction->change_amount > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Kembalian:</span>
                            <span>Rp {{ number_format($transaction->change_amount, 0, ',', '.') }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-gray-700">
                            <span>Metode Pembayaran:</span>
                            <span>{{ $transaction->paymentMethod->name_payment_method ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-8 border-t text-center">
                <div class="space-y-2 text-gray-600">
                    @if($transaction->notes)
                    <p><strong>Catatan:</strong> {{ $transaction->notes }}</p>
                    @endif
                    <p class="text-sm">Terima kasih atas kepercayaan Anda berbelanja di Gentle Baby!</p>
                    <p class="text-sm">{{ $transaction->salesType->name_sales_type ?? 'Penjualan Langsung' }} | {{ $transaction->branch->name_branch ?? 'Cabang Utama' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice-content, #invoice-content * {
                visibility: visible;
            }
            #invoice-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>

    <script>
        // Auto print if needed
        @if(request('print') == 'true')
            window.onload = function() {
                window.print();
            }
        @endif
    </script>
</x-admin-layout>

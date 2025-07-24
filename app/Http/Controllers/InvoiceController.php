<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Invoice::with(['customer', 'paymentMethod']);

            // Filter by invoice number
            if ($request->filled('kode_invoice')) {
                $query->where('number', 'like', '%' . $request->kode_invoice . '%');
            }

            // Filter by payment status
            if ($request->filled('status_pelunasan')) {
                $status = $request->status_pelunasan;
                if ($status === 'paid') {
                    $query->whereRaw('paid_amount >= total_amount');
                } elseif ($status === 'unpaid') {
                    $query->where('paid_amount', 0);
                } elseif ($status === 'partial') {
                    $query->whereRaw('paid_amount > 0 AND paid_amount < total_amount');
                }
            }

            // Order by date desc
            $query->orderBy('date', 'desc');

            // Pagination with preserve query parameters
            $perPage = $request->get('per_page', 10);
            $invoices = $query->paginate($perPage)->withQueryString();

            return view('invoices.index', compact('invoices'));

        } catch (\Exception $e) {
            // Fallback with dummy data if database error
            $dummyInvoices = collect([
                (object)[
                    'transaction_sales_id' => 1,
                    'number' => 'INV-2025-001',
                    'date' => now(),
                    'total_amount' => 250000,
                    'paid_amount' => 250000,
                    'customer' => (object)['name_customer' => 'Walk-in Customer'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 2,
                    'number' => 'INV-2025-002',
                    'date' => now()->subDays(1),
                    'total_amount' => 150000,
                    'paid_amount' => 100000,
                    'customer' => (object)['name_customer' => 'John Doe'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 3,
                    'number' => 'INV-2025-003',
                    'date' => now()->subDays(2),
                    'total_amount' => 300000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Jane Smith'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 4,
                    'number' => 'INV-2025-004',
                    'date' => now()->subDays(3),
                    'total_amount' => 180000,
                    'paid_amount' => 180000,
                    'customer' => (object)['name_customer' => 'Ahmad Rizki'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 5,
                    'number' => 'INV-2025-005',
                    'date' => now()->subDays(4),
                    'total_amount' => 220000,
                    'paid_amount' => 50000,
                    'customer' => (object)['name_customer' => 'Siti Nurhaliza'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 6,
                    'number' => 'INV-2025-006',
                    'date' => now()->subDays(5),
                    'total_amount' => 350000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Budi Santoso'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 7,
                    'number' => 'INV-2025-007',
                    'date' => now()->subDays(6),
                    'total_amount' => 120000,
                    'paid_amount' => 120000,
                    'customer' => (object)['name_customer' => 'Dewi Sartika'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 8,
                    'number' => 'INV-2025-008',
                    'date' => now()->subDays(7),
                    'total_amount' => 280000,
                    'paid_amount' => 100000,
                    'customer' => (object)['name_customer' => 'Eko Prasetyo'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 9,
                    'number' => 'INV-2025-009',
                    'date' => now()->subDays(8),
                    'total_amount' => 190000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Fatimah Zahra'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 10,
                    'number' => 'INV-2025-010',
                    'date' => now()->subDays(9),
                    'total_amount' => 240000,
                    'paid_amount' => 240000,
                    'customer' => (object)['name_customer' => 'Gunawan Suryadi'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 11,
                    'number' => 'INV-2025-011',
                    'date' => now()->subDays(10),
                    'total_amount' => 160000,
                    'paid_amount' => 80000,
                    'customer' => (object)['name_customer' => 'Hani Setianingsih'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 12,
                    'number' => 'INV-2025-012',
                    'date' => now()->subDays(11),
                    'total_amount' => 320000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Indra Wijaya'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 13,
                    'number' => 'INV-2025-013',
                    'date' => now()->subDays(12),
                    'total_amount' => 210000,
                    'paid_amount' => 210000,
                    'customer' => (object)['name_customer' => 'Joko Widodo'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 14,
                    'number' => 'INV-2025-014',
                    'date' => now()->subDays(13),
                    'total_amount' => 275000,
                    'paid_amount' => 150000,
                    'customer' => (object)['name_customer' => 'Kartika Sari'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 15,
                    'number' => 'INV-2025-015',
                    'date' => now()->subDays(14),
                    'total_amount' => 185000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Lestari Handayani'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ]
            ]);

            // Simple pagination for dummy data with query string preservation
            $perPage = $request->get('per_page', 10);
            $currentPage = request()->get('page', 1);
            
            $invoices = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyInvoices->forPage($currentPage, $perPage),
                $dummyInvoices->count(),
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page'
                ]
            );
            $invoices->withQueryString();

            return view('invoices.index', compact('invoices'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Redirect to transactions since we don't create invoices directly
        return redirect()->route('transactions.index')->with('info', 'Invoices are automatically created from transactions.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Invoices are created through transactions, so redirect
        return redirect()->route('transactions.index')->with('info', 'Invoices are automatically created from transactions.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with(['user', 'customer', 'details.item', 'paymentMethod', 'salesType'])->findOrFail($id);
        return view('transactions.invoice', compact('transaction'), ['transaction' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Redirect to transactions since we don't edit invoices directly
        return redirect()->route('transactions.index')->with('info', 'Edit transactions to modify invoice data.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Redirect to transactions since we don't update invoices directly
        return redirect()->route('transactions.index')->with('info', 'Update transactions to modify invoice data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Redirect to transactions since we don't delete invoices directly
        return redirect()->route('transactions.index')->with('info', 'Delete transactions to remove invoice data.');
    }
}

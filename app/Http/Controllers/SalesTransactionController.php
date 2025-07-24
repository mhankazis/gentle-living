<?php

namespace App\Http\Controllers;

use App\Models\TransactionSale;
use App\Models\TransactionSaleDetail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalesTransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index(Request $request)
    {
        try {
            $query = TransactionSale::with(['customer', 'user', 'branch', 'paymentMethod', 'salesType']);

            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('number', 'like', "%{$search}%")
                      ->orWhereHas('customer', function($customerQuery) use ($search) {
                          $customerQuery->where('name_customer', 'like', "%{$search}%");
                      });
                });
            }

            // Date filter
            if ($request->has('date_from') && $request->date_from) {
                $query->whereDate('date', '>=', $request->date_from);
            }
            
            if ($request->has('date_to') && $request->date_to) {
                $query->whereDate('date', '<=', $request->date_to);
            }

            // Pagination with per_page parameter and query string preservation
            $perPage = $request->get('per_page', 10);
            $transactions = $query->orderBy('date', 'desc')->paginate($perPage)->withQueryString();

            return view('transactions.index', compact('transactions'));

        } catch (\Exception $e) {
            // Fallback with dummy data if database error
            $dummyTransactions = collect([
                (object)[
                    'transaction_sales_id' => 1,
                    'number' => 'TXN-2025-001',
                    'date' => now(),
                    'total_amount' => 250000,
                    'paid_amount' => 250000,
                    'customer' => (object)['name_customer' => 'Walk-in Customer'],
                    'user' => (object)['name' => 'Admin'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ],
                (object)[
                    'transaction_sales_id' => 2,
                    'number' => 'TXN-2025-002',
                    'date' => now()->subDays(1),
                    'total_amount' => 150000,
                    'paid_amount' => 100000,
                    'customer' => (object)['name_customer' => 'John Doe'],
                    'user' => (object)['name' => 'Admin'],
                    'paymentMethod' => (object)['name_payment_method' => 'Transfer']
                ],
                (object)[
                    'transaction_sales_id' => 3,
                    'number' => 'TXN-2025-003',
                    'date' => now()->subDays(2),
                    'total_amount' => 300000,
                    'paid_amount' => 0,
                    'customer' => (object)['name_customer' => 'Jane Smith'],
                    'user' => (object)['name' => 'Admin'],
                    'paymentMethod' => (object)['name_payment_method' => 'Cash']
                ]
            ]);

            // Simple pagination for dummy data with query string preservation
            $perPage = $request->get('per_page', 10);
            $currentPage = request()->get('page', 1);
            
            $transactions = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyTransactions->forPage($currentPage, $perPage),
                $dummyTransactions->count(),
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'pageName' => 'page'
                ]
            );
            $transactions->withQueryString();

            return view('transactions.index', compact('transactions'));
        }
    }

    /**
     * Display the specified transaction (Invoice).
     */
    public function show($id)
    {
        $transaction = TransactionSale::with(['details.item', 'customer', 'user', 'branch', 'paymentMethod', 'salesType'])
                                     ->findOrFail($id);
        
        return view('transactions.invoice', compact('transaction'));
    }

    /**
     * Display invoice for the specified transaction.
     */
    public function invoice($id)
    {
        $transaction = TransactionSale::with(['details.item', 'customer', 'user', 'branch', 'paymentMethod', 'salesType'])
                                     ->findOrFail($id);
        
        return view('transactions.invoice', compact('transaction'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        try {
            $customers = Customer::all();
            $products = Product::with('category')->get();
            $paymentMethods = PaymentMethod::all();
            
            return view('transactions.create', compact('customers', 'products', 'paymentMethods'));
            
        } catch (\Exception $e) {
            Log::error('Error loading transaction create form: ' . $e->getMessage());
            
            // Fallback with dummy data
            $customers = collect([
                (object)['customer_id' => 1, 'name_customer' => 'Walk-in Customer'],
                (object)['customer_id' => 2, 'name_customer' => 'John Doe'],
            ]);
            
            $products = collect([
                (object)[
                    'item_id' => 1, 
                    'name_item' => 'Baju Bayi Premium', 
                    'sell_price' => 75000,
                    'sellingprice_item' => 75000, // For view compatibility
                    'stock' => 20,
                    'stock_item' => 20, // For view compatibility
                    'category' => (object)['name_category' => 'Pakaian Bayi']
                ],
            ]);
            
            $paymentMethods = collect([
                (object)['payment_method_id' => 1, 'name_payment_method' => 'Cash'],
                (object)['payment_method_id' => 2, 'name_payment_method' => 'Transfer'],
            ]);
            
            return view('transactions.create', compact('customers', 'products', 'paymentMethods'));
        }
    }

    /**
     * Store a newly created transaction.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_id' => 'nullable|integer',
                'payment_method_id' => 'required|integer',
                'items' => 'required|array|min:1',
                'items.*.product_id' => 'required|integer',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.price' => 'required|numeric|min:0',
                'discount' => 'nullable|numeric|min:0',
            ]);

            DB::beginTransaction();

            // Create transaction
            $transaction = TransactionSale::create([
                'number' => 'TXN-' . date('Ymd') . '-' . str_pad(TransactionSale::count() + 1, 4, '0', STR_PAD_LEFT),
                'date' => now(),
                'customer_id' => $validated['customer_id'] ?? 1, // Default to customer_id 1 if none selected
                'payment_method_id' => $validated['payment_method_id'],
                'user_id' => auth()->user()->id ?? 1,
                'branch_id' => 1, // Default branch
                'sales_type_id' => 1, // Default sales type
                'subtotal' => 0,
                'discount_amount' => $validated['discount'] ?? 0,
                'total_amount' => 0,
                'paid_amount' => 0,
            ]);

            $subtotal = 0;
            
            // Create transaction details
            foreach ($validated['items'] as $item) {
                $itemTotal = $item['quantity'] * $item['price'];
                $subtotal += $itemTotal;
                
                $transaction->details()->create([
                    'item_id' => $item['product_id'],
                    'qty' => $item['quantity'],
                    'sell_price' => $item['price'],
                    'subtotal' => $itemTotal,
                    'total_amount' => $itemTotal,
                    'costprice' => 0, // Default value, could be fetched from product if needed
                    'discount_amount' => 0,
                    'discount_percentage' => 0,
                ]);
            }

            // Update transaction totals
            $total = $subtotal - ($validated['discount'] ?? 0);
            $transaction->update([
                'subtotal' => $subtotal,
                'total_amount' => $total,
                'paid_amount' => $total, // Assume fully paid for now
            ]);

            DB::commit();

            return redirect()->route('transactions.show', $transaction->transaction_sales_id)
                           ->with('success', 'Transaksi berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating transaction: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal membuat transaksi: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified transaction.
     */
    public function edit($id)
    {
        try {
            $transaction = TransactionSale::with(['details.item', 'customer'])->findOrFail($id);
            $customers = Customer::all();
            $products = Product::with('category')->get();
            $paymentMethods = PaymentMethod::all();
            
            return view('transactions.edit', compact('transaction', 'customers', 'products', 'paymentMethods'));
            
        } catch (\Exception $e) {
            Log::error('Error loading transaction edit form: ' . $e->getMessage());
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    /**
     * Update the specified transaction.
     */
    public function update(Request $request, $id)
    {
        try {
            $transaction = TransactionSale::findOrFail($id);
            
            $validated = $request->validate([
                'customer_id' => 'nullable|integer',
                'payment_method_id' => 'required|integer',
                'discount' => 'nullable|numeric|min:0',
                'tax' => 'nullable|numeric|min:0',
                'paid_amount' => 'required|numeric|min:0',
            ]);

            $transaction->update($validated);

            return redirect()->route('transactions.index')
                           ->with('success', 'Transaksi berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating transaction: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui transaksi: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified transaction.
     */
    public function destroy($id)
    {
        try {
            $transaction = TransactionSale::findOrFail($id);
            
            // Delete transaction details first
            $transaction->details()->delete();
            
            // Delete transaction
            $transaction->delete();

            return redirect()->route('transactions.index')
                           ->with('success', 'Transaksi berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting transaction: ' . $e->getMessage());
            return redirect()->route('transactions.index')
                           ->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }
}

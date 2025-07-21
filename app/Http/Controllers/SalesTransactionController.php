<?php

namespace App\Http\Controllers;

use App\Models\TransactionSale;
use Illuminate\Http\Request;

class SalesTransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index(Request $request)
    {
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

        // Pagination with per_page parameter
        $perPage = $request->get('per_page', 10);
        $transactions = $query->orderBy('date', 'desc')->paginate($perPage);

        return view('transactions.index', compact('transactions'));
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
}

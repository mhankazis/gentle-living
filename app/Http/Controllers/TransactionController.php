<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        // Handle search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_transaksi', 'like', "%{$search}%")
                  ->orWhere('nama_perusahaan', 'like', "%{$search}%");
            });
        }

        // Handle date range filter
        if ($request->has('date_range') && $request->date_range) {
            $dateRange = explode(' - ', $request->date_range);
            if (count($dateRange) == 2) {
                $startDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[0]))->startOfDay();
                $endDate = Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))->endOfDay();
                $query->whereBetween('tanggal_transaksi', [$startDate, $endDate]);
            }
        }

        $transactions = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|string|unique:transactions',
            'tanggal_transaksi' => 'required|date',
            'nama_perusahaan' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        Transaction::create($validated);
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);
        
        $validated = $request->validate([
            'kode_transaksi' => 'required|string|unique:transactions,kode_transaksi,' . $id,
            'tanggal_transaksi' => 'required|date',
            'nama_perusahaan' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        $transaction->update($validated);
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}

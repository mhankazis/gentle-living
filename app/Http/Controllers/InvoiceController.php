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
        $query = Invoice::with(['user', 'customer', 'paymentMethod']);

        // Handle search filters
        if ($request->has('kode_invoice') && $request->kode_invoice) {
            $query->where('number', 'like', "%{$request->kode_invoice}%");
        }

        if ($request->has('status_pelunasan') && $request->status_pelunasan && $request->status_pelunasan !== 'semua') {
            if ($request->status_pelunasan === 'paid') {
                $query->whereRaw('paid_amount >= total_amount');
            } else {
                $query->whereRaw('paid_amount < total_amount');
            }
        }

        if ($request->has('status_dp') && $request->status_dp && $request->status_dp !== 'semua') {
            // For DP status, check if payment is partial
            if ($request->status_dp === 'ada_dp') {
                $query->whereRaw('paid_amount > 0 AND paid_amount < total_amount');
            } else {
                $query->whereRaw('paid_amount = 0 OR paid_amount >= total_amount');
            }
        }

        $invoices = $query->orderBy('date', 'desc')->paginate(10);
        
        return view('invoices.index', compact('invoices'));
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

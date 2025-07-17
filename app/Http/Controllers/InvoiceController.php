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
        $query = Invoice::with('user');

        // Handle search filters
        if ($request->has('kode_invoice') && $request->kode_invoice) {
            $query->where('invoice_number', 'like', "%{$request->kode_invoice}%");
        }

        if ($request->has('status_pelunasan') && $request->status_pelunasan && $request->status_pelunasan !== 'semua') {
            $query->where('status', $request->status_pelunasan);
        }

        if ($request->has('status_dp') && $request->status_dp && $request->status_dp !== 'semua') {
            // For DP status, we'll use a different logic since the existing table doesn't have DP fields
            // We'll simulate this for the interface
        }

        $invoices = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|unique:invoices',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid,partial',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);

        Invoice::create($validated);
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with('user')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::findOrFail($id);
        
        $validated = $request->validate([
            'invoice_number' => 'required|string|unique:invoices,invoice_number,' . $id,
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid,partial',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);

        $invoice->update($validated);
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
    }
}

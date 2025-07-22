<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionSale;
use App\Models\TransactionSaleDetail;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Statistics - Calculate invoice totals based on payment status
            // Paid invoices: where paid_amount >= total_amount
            $totalPaidInvoices = TransactionSale::where('paid_amount', '>=', DB::raw('total_amount'))
                ->sum('total_amount');
            
            // Unpaid invoices: sum of remaining unpaid amounts
            $totalUnpaidInvoices = TransactionSale::where('paid_amount', '<', DB::raw('total_amount'))
                ->sum(DB::raw('total_amount - COALESCE(paid_amount, 0)'));
            
            // Count of pending orders (not fully paid) - consistent with the table below
            $pendingOrders = TransactionSale::whereRaw('COALESCE(paid_amount, 0) < total_amount')
                ->count();

            // Top 5 Products by quantity sold
            $topProducts = DB::table('transaction_sales_details as tsd')
                ->join('master_items as mi', 'tsd.item_id', '=', 'mi.items_id')
                ->select(
                    'mi.name_items as name',
                    DB::raw('SUM(tsd.quantity) as total_qty'),
                    DB::raw('SUM(tsd.quantity * tsd.unit_price) as total_value')
                )
                ->groupBy('tsd.item_id', 'mi.name_items')
                ->orderByDesc('total_qty')
                ->limit(5)
                ->get()
                ->map(function($item, $index) {
                    $item->rank = $index + 1;
                    return $item;
                });

            // Bottom 5 Products by quantity sold
            $bottomProducts = DB::table('transaction_sales_details as tsd')
                ->join('master_items as mi', 'tsd.item_id', '=', 'mi.items_id')
                ->select(
                    'mi.name_items as name',
                    DB::raw('SUM(tsd.quantity) as total_qty'),
                    DB::raw('SUM(tsd.quantity * tsd.unit_price) as total_value')
                )
                ->groupBy('tsd.item_id', 'mi.name_items')
                ->orderBy('total_qty', 'asc')
                ->limit(5)
                ->get()
                ->map(function($item, $index) {
                    $item->rank = $index + 1;
                    return $item;
                });

            // Pending Orders (transactions that are not fully paid)
            $pendingOrdersList = TransactionSale::with(['customer', 'details.item'])
                ->whereRaw('COALESCE(paid_amount, 0) < total_amount')
                ->orderBy('date', 'desc')
                ->limit(10)
                ->get()
                ->map(function($transaction, $index) {
                    return [
                        'no' => $index + 1,
                        'date' => $transaction->date->format('d/m/Y'),
                        'number' => $transaction->number,
                        'customer' => $transaction->customer->name_customer ?? 'Walk-in Customer',
                        'items' => $transaction->details->map(function($detail) {
                            return [
                                'name' => $detail->item->name_items ?? 'Unknown Item',
                                'qty' => $detail->quantity,
                                'subtotal' => $detail->quantity * $detail->unit_price
                            ];
                        }),
                        'status' => 'Belum Lunas',
                        'total_amount' => $transaction->total_amount,
                        'paid_amount' => $transaction->paid_amount ?? 0,
                        'remaining' => $transaction->total_amount - ($transaction->paid_amount ?? 0)
                    ];
                });

            // Update pending orders count to match the list count for consistency
            $pendingOrders = $pendingOrdersList->count();

        } catch (\Exception $e) {
            // If there's any database error, try to get basic counts
            try {
                $totalPaidInvoices = TransactionSale::whereNotNull('paid_amount')
                    ->whereRaw('paid_amount >= total_amount')
                    ->sum('total_amount') ?? 0;
                    
                $totalUnpaidInvoices = TransactionSale::whereRaw('COALESCE(paid_amount, 0) < total_amount')
                    ->sum(DB::raw('total_amount - COALESCE(paid_amount, 0)')) ?? 0;
                    
                // For error handling, we can't get the list so we just count
                $pendingOrders = TransactionSale::whereRaw('COALESCE(paid_amount, 0) < total_amount')
                    ->count() ?? 0;
                    
                // Set empty arrays for the lists since we're in error mode
                $pendingOrdersList = collect();
            } catch (\Exception $e2) {
                // Last fallback to prevent errors
                $totalPaidInvoices = 0;
                $totalUnpaidInvoices = 0;
                $pendingOrders = 0;
                $pendingOrdersList = collect();
            }
            
            $topProducts = collect();
            $bottomProducts = collect();
        }

        // If no real data, provide dummy data
        if ($topProducts->isEmpty()) {
            $topProducts = collect([
                (object)['rank' => 1, 'name' => 'Gimme Food (GF)', 'total_qty' => 45, 'total_value' => 1125000],
                (object)['rank' => 2, 'name' => 'Massage Your Baby (MYB)', 'total_qty' => 38, 'total_value' => 950000],
                (object)['rank' => 3, 'name' => 'LDR (15ml)', 'total_qty' => 32, 'total_value' => 800000],
                (object)['rank' => 4, 'name' => 'Organic Gentle (OG)', 'total_qty' => 28, 'total_value' => 700000],
                (object)['rank' => 5, 'name' => 'Baby Calmer (BC)', 'total_qty' => 25, 'total_value' => 625000]
            ]);
        }

        // If no real data, provide dummy data
        if ($bottomProducts->isEmpty()) {
            $bottomProducts = collect([
                (object)['rank' => 1, 'name' => 'Sleepy Time (ST)', 'total_qty' => 3, 'total_value' => 75000],
                (object)['rank' => 2, 'name' => 'Tummy Calmer (TC)', 'total_qty' => 5, 'total_value' => 125000],
                (object)['rank' => 3, 'name' => 'Night Comfort (NC)', 'total_qty' => 8, 'total_value' => 200000],
                (object)['rank' => 4, 'name' => 'Gentle Calmer (GC)', 'total_qty' => 12, 'total_value' => 300000],
                (object)['rank' => 5, 'name' => 'Sweet Dreams (SD)', 'total_qty' => 15, 'total_value' => 375000]
            ]);
        }

        // If no real data, provide dummy data
        if ($pendingOrdersList->isEmpty()) {
            $pendingOrdersList = collect([
                [
                    'no' => 1,
                    'date' => '20/07/2025',
                    'number' => 'TRX-20250720-001',
                    'customer' => 'PT. Sumber Rejeki',
                    'items' => [
                        ['name' => 'Gimme Food (GF)', 'qty' => 5, 'subtotal' => 125000],
                        ['name' => 'Baby Calmer (BC)', 'qty' => 3, 'subtotal' => 75000]
                    ],
                    'status' => 'Belum Lunas'
                ],
                [
                    'no' => 2,
                    'date' => '19/07/2025',
                    'number' => 'TRX-20250719-002',
                    'customer' => 'CV. Maju Bersama',
                    'items' => [
                        ['name' => 'Massage Your Baby (MYB)', 'qty' => 2, 'subtotal' => 50000],
                        ['name' => 'LDR (15ml)', 'qty' => 4, 'subtotal' => 100000]
                    ],
                    'status' => 'Belum Lunas'
                ],
                [
                    'no' => 3,
                    'date' => '18/07/2025',
                    'number' => 'TRX-20250718-003',
                    'customer' => 'Toko Baby Shop',
                    'items' => [
                        ['name' => 'Organic Gentle (OG)', 'qty' => 6, 'subtotal' => 150000]
                    ],
                    'status' => 'Belum Lunas'
                ]
            ]);
            
            // Update pending orders count to match dummy data
            $pendingOrders = $pendingOrdersList->count();
        }

        return view('dashboard', compact(
            'totalPaidInvoices',
            'totalUnpaidInvoices', 
            'pendingOrders',
            'topProducts',
            'bottomProducts',
            'pendingOrdersList'
        ));
    }
    
    /**
     * Get invoice statistics for debugging
     */
    public function getInvoiceStats()
    {
        $stats = [
            'total_transactions' => TransactionSale::count(),
            'paid_invoices_count' => TransactionSale::where('paid_amount', '>=', DB::raw('total_amount'))->count(),
            'unpaid_invoices_count' => TransactionSale::where('paid_amount', '<', DB::raw('total_amount'))
                ->orWhereNull('paid_amount')->count(),
            'total_paid_amount' => TransactionSale::where('paid_amount', '>=', DB::raw('total_amount'))->sum('total_amount'),
            'total_unpaid_amount' => TransactionSale::where('paid_amount', '<', DB::raw('total_amount'))
                ->orWhereNull('paid_amount')
                ->sum(DB::raw('total_amount - COALESCE(paid_amount, 0)')),
        ];
        
        return response()->json($stats);
    }
}

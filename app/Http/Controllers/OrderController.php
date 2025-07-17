<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This will be the order creation page (Pemesanan Produk)
        $companies = Company::all();
        $products = Product::with('category')->get();
        
        return view('orders.index', compact('companies', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'cart' => 'required|array|min:1',
            'cart.*.product_id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            // Create the order
            $order = Order::create([
                'company_id' => $request->company_id,
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT),
                'status' => 'draft',
                'total_amount' => 0,
                'total_quantity' => 0,
            ]);

            $totalAmount = 0;
            $totalQuantity = 0;

            // Create order items
            foreach ($request->cart as $item) {
                $product = Product::find($item['product_id']);
                $quantity = $item['quantity'];
                $unitPrice = $product->price;
                $totalPrice = $unitPrice * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);

                $totalAmount += $totalPrice;
                $totalQuantity += $quantity;
            }

            // Update order totals
            $order->update([
                'total_amount' => $totalAmount,
                'total_quantity' => $totalQuantity,
            ]);
        });

        return response()->json(['success' => true, 'message' => 'Order created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

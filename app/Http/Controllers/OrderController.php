<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Company;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Load companies from master_companies table
            $companies = DB::table('master_companies')
                          ->whereNull('deleted_at')
                          ->select('company_id as id', 'name_company as name', 'phone_company as owner_name', 'address_company as address')
                          ->get();

            // Load products from master_items table with categories
            $products = DB::table('master_items')
                         ->leftJoin('master_categories', 'master_items.category_id', '=', 'master_categories.category_id')
                         ->whereNull('master_items.deleted_at')
                         ->select(
                             'master_items.item_id as id',
                             'master_items.name_item as name',
                             'master_items.costprice_item as price',
                             'master_items.description_item as description',
                             'master_categories.name_category'
                         )
                         ->get()
                         ->map(function($product) {
                             $product->category = (object)['name' => $product->name_category];
                             $product->image = null; // Default image placeholder
                             return $product;
                         });
            
            return view('orders.index', compact('companies', 'products'));

        } catch (\Exception $e) {
            Log::error('Error loading orders page: ' . $e->getMessage());
            
            // Fallback data
            $companies = collect([
                (object)[
                    'id' => 1,
                    'name' => 'No company data available',
                    'owner_name' => '-',
                    'address' => '-'
                ]
            ]);
            
            $products = collect([
                (object)[
                    'id' => 1,
                    'name' => 'No product data available',
                    'price' => 0,
                    'image' => null,
                    'category' => (object)['name' => 'No Category']
                ]
            ]);
            
            return view('orders.index', compact('companies', 'products'));
        }
    }    /**
     * Show all orders (Order History)
     */
    public function history(Request $request)
    {
        try {
            $query = Order::with(['company', 'user', 'items.product'])->orderBy('created_at', 'desc');

            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('order_number', 'like', "%{$search}%")
                      ->orWhereHas('company', function($companyQuery) use ($search) {
                          $companyQuery->where('name_company', 'like', "%{$search}%");
                      });
                });
            }

            // Status filter
            if ($request->has('status') && $request->status) {
                $query->where('status', $request->status);
            }

            $orders = $query->paginate(10);
            return view('orders.history', compact('orders'));

        } catch (\Exception $e) {
            Log::error('Error fetching order history: ' . $e->getMessage());
            
            // Fallback dummy data
            $dummyOrders = collect([
                (object)[
                    'id' => 1,
                    'order_number' => 'ORD-20250124-0001',
                    'status' => 'completed',
                    'total_amount' => 500000,
                    'total_quantity' => 5,
                    'created_at' => now(),
                    'company' => (object)['name_company' => 'CV Berkah Jaya'],
                    'user' => (object)['name' => 'Admin']
                ]
            ]);
            
            $orders = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyOrders,
                $dummyOrders->count(),
                10,
                1,
                ['path' => request()->url()]
            );
            
            return view('orders.history', compact('orders'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'company_id' => 'required|integer',
                'cart' => 'required|array|min:1',
                'cart.*.product_id' => 'required|integer',
                'cart.*.quantity' => 'required|integer|min:1',
            ]);

            DB::transaction(function () use ($validated) {
                // Create the order
                $order = Order::create([
                    'company_id' => $validated['company_id'],
                    'user_id' => Auth::id(),
                    'order_number' => 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT),
                    'status' => 'draft',
                    'total_amount' => 0,
                    'total_quantity' => 0,
                ]);

                $totalAmount = 0;
                $totalQuantity = 0;

                // Create order items
                foreach ($validated['cart'] as $item) {
                    $product = Product::find($item['product_id']);
                    if (!$product) continue;

                    $subtotal = ($product->sell_price ?? $product->costprice_item ?? 0) * $item['quantity'];
                    
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'unit_price' => $product->sell_price ?? $product->costprice_item ?? 0,
                        'subtotal' => $subtotal,
                    ]);

                    $totalAmount += $subtotal;
                    $totalQuantity += $item['quantity'];
                }

                // Update order totals
                $order->update([
                    'total_amount' => $totalAmount,
                    'total_quantity' => $totalQuantity,
                ]);
            });

            return redirect()->route('orders.history')->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        try {
            $order->load(['company', 'user', 'items.product.category']);
            return view('orders.show', compact('order'));

        } catch (\Exception $e) {
            Log::error('Error showing order: ' . $e->getMessage());
            return redirect()->route('orders.history')->with('error', 'Pesanan tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, Order $order)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:draft,confirmed,processing,completed,cancelled'
            ]);

            $order->update($validated);
            return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating order status: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui status pesanan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            // Only allow deletion of draft orders
            if ($order->status !== 'draft') {
                return redirect()->route('orders.history')->with('error', 'Hanya pesanan draft yang dapat dihapus!');
            }

            $order->delete();
            return redirect()->route('orders.history')->with('success', 'Pesanan berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting order: ' . $e->getMessage());
            return redirect()->route('orders.history')->with('error', 'Gagal menghapus pesanan');
        }
    }
}

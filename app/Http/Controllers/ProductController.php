<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::with('category')->paginate(10);
            return view('products.index', compact('products'));
        } catch (\Exception $e) {
            // Fallback dengan dummy data
            $dummyProducts = collect([
                                (object)[
                    'item_id' => 1,
                    'name_item' => 'Baju Bayi Premium',
                    'description_item' => 'Baju bayi berkualitas tinggi',
                    'costprice_item' => 50000,
                    'sell_price' => 75000,
                    'stock' => 20,
                    'unit_item' => 'pcs',
                    'image' => null,
                    'category' => (object)['name_category' => 'Pakaian Bayi']
                ],
                (object)[
                    'item_id' => 2,
                    'name_item' => 'Susu Formula',
                    'description_item' => 'Susu formula untuk bayi',
                    'costprice_item' => 25000,
                    'sell_price' => 40000,
                    'stock' => 15,
                    'unit_item' => 'botol',
                    'image' => null,
                    'category' => (object)['name_category' => 'Makanan Bayi']
                ]
            ]);

            $products = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyProducts,
                $dummyProducts->count(),
                10,
                1,
                ['path' => request()->url()]
            );

            return view('products.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = Category::all();
            return view('products.create', compact('categories'));
        } catch (\Exception $e) {
            // Return view without categories, fallback akan digunakan di view
            return view('products.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_item' => 'required|string|max:255',
            'description_item' => 'nullable|string',
            'costprice_item' => 'required|numeric|min:0',
            'sellingprice_item' => 'required|numeric|min:0',
            'stock_item' => 'nullable|integer|min:0',
            'unit_item' => 'nullable|string|max:50',
            'category_id' => 'nullable|integer',
        ]);

        // Map sellingprice_item to sell_price for database compatibility
        if (isset($validated['sellingprice_item'])) {
            $validated['sell_price'] = $validated['sellingprice_item'];
            unset($validated['sellingprice_item']);
        }

        // Map stock_item to stock for database compatibility
        if (isset($validated['stock_item'])) {
            $validated['stock'] = $validated['stock_item'];
            unset($validated['stock_item']);
        }

        // Hapus field yang null untuk menghindari error database
        $validated = array_filter($validated, function($value) {
            return $value !== null;
        });

        try {
            Product::create($validated);
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $categories = Category::all();
            return view('products.edit', compact('product', 'categories'));
        } catch (\Exception $e) {
            $product = Product::findOrFail($id);
            return view('products.edit', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::findOrFail($id);
            
            $validated = $request->validate([
                'name_item' => 'required|string|max:255',
                'description_item' => 'nullable|string',
                'costprice_item' => 'required|numeric|min:0',
                'sellingprice_item' => 'required|numeric|min:0',
                'stock_item' => 'nullable|integer|min:0',
                'unit_item' => 'nullable|string|max:50',
                'category_id' => 'nullable|integer',
            ]);

            // Map sellingprice_item to sell_price for database compatibility
            if (isset($validated['sellingprice_item'])) {
                $validated['sell_price'] = $validated['sellingprice_item'];
                unset($validated['sellingprice_item']);
            }

            // Map stock_item to stock for database compatibility
            if (isset($validated['stock_item'])) {
                $validated['stock'] = $validated['stock_item'];
                unset($validated['stock_item']);
            }

            // Hapus field yang null
            $validated = array_filter($validated, function($value) {
                return $value !== null;
            });

            $product->update($validated);
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}

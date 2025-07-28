Route::get('/test-transaction', function() {
    try {
        $customer = App\Models\Customer::first();
        $product = App\Models\Product::first();
        $paymentMethod = App\Models\PaymentMethod::first();
        
        if (!$customer || !$product || !$paymentMethod) {
            return response()->json(['error' => 'Missing master data'], 400);
        }
        
        // Simulate form data
        $data = [
            'customer_id' => $customer->customer_id,
            'payment_method_id' => $paymentMethod->payment_method_id,
            'items' => [
                [
                    'product_id' => $product->item_id,
                    'quantity' => 2,
                    'price' => 50000
                ]
            ],
            'discount' => 0
        ];
        
        $request = new Illuminate\Http\Request();
        $request->merge($data);
        
        $controller = new App\Http\Controllers\SalesTransactionController();
        $response = $controller->store($request);
        
        return response()->json(['success' => 'Transaction test completed', 'response' => $response]);
        
    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
});

<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\Product;

try {
    echo "Testing product update...\n";
    
    // Get the first product
    $product = Product::first();
    if (!$product) {
        echo "No product found!\n";
        exit;
    }
    
    echo "Found product: {$product->name_item}\n";
    echo "Current unit: " . ($product->unit_item ?? 'NULL') . "\n";
    
    // Try to update the product
    echo "Attempting to update product...\n";
    
    $updateData = [
        'name_item' => 'Deep Sleep Test',
        'description_item' => '-',
        'ingredient_item' => '-',
        'netweight_item' => '30 ml',
        'contain_item' => '-',
        'costprice_item' => 25000.00,
        'unit_item' => 'pcs',
        'sell_price' => 90000,
        'stock' => 0
    ];
    
    echo "Update data:\n";
    print_r($updateData);
    
    $product->update($updateData);
    
    echo "Product updated successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

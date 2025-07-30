<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\Product;

try {
    echo "Testing database connection...\n";
    
    // Test basic connection
    $result = DB::select('SELECT 1 as test');
    echo "Database connection: OK\n";
    
    // Check table structure
    $columns = DB::select('DESCRIBE master_items');
    echo "master_items table columns:\n";
    foreach ($columns as $column) {
        echo "- {$column->Field} ({$column->Type})\n";
    }
    
    // Test Product model
    $count = Product::count();
    echo "Total products in database: {$count}\n";
    
    if ($count > 0) {
        $product = Product::first();
        echo "First product: {$product->name_item}\n";
        echo "Unit: " . ($product->unit_item ?? 'NULL') . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

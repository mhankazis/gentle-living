<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('master_items', function (Blueprint $table) {
            $table->double('sell_price')->nullable()->after('costprice_item');
            $table->integer('stock')->default(0)->after('sell_price');
            $table->string('unit_item', 50)->nullable()->after('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_items', function (Blueprint $table) {
            $table->dropColumn(['sell_price', 'stock', 'unit_item']);
        });
    }
};

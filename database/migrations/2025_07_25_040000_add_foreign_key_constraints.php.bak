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
        // Add foreign key constraints to transaction_sales
        Schema::table('transaction_sales', function (Blueprint $table) {
            $table->foreign('customer_id')->references('customer_id')->on('master_customers')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('master_users')->onDelete('cascade');
            $table->foreign('branch_id')->references('branch_id')->on('master_branches')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('payment_method_id')->on('master_payment_methods')->onDelete('cascade');
            $table->foreign('sales_type_id')->references('sales_type_id')->on('master_sales_types')->onDelete('cascade');
        });

        // Add foreign key constraints to transaction_sales_details
        Schema::table('transaction_sales_details', function (Blueprint $table) {
            $table->foreign('transaction_sales_id')->references('transaction_sales_id')->on('transaction_sales')->onDelete('cascade');
            $table->foreign('item_id')->references('item_id')->on('master_items')->onDelete('cascade');
        });

        // Add foreign key constraints to master_items
        Schema::table('master_items', function (Blueprint $table) {
            $table->foreign('category_id')->references('category_id')->on('master_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key constraints from transaction_sales
        Schema::table('transaction_sales', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['payment_method_id']);
            $table->dropForeign(['sales_type_id']);
        });

        // Drop foreign key constraints from transaction_sales_details
        Schema::table('transaction_sales_details', function (Blueprint $table) {
            $table->dropForeign(['transaction_sales_id']);
            $table->dropForeign(['item_id']);
        });

        // Drop foreign key constraints from master_items
        Schema::table('master_items', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};

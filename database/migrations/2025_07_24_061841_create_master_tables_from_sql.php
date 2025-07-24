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
        // Create master_categories table
        Schema::create('master_categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name_category')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create master_items table
        Schema::create('master_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->integer('category_id');
            $table->string('name_item')->nullable();
            $table->text('description_item')->nullable();
            $table->text('ingredient_item')->nullable();
            $table->string('netweight_item')->nullable();
            $table->text('contain_item')->nullable();
            $table->double('costprice_item')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create master_customers table
        Schema::create('master_customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('name_customer')->nullable();
            $table->text('address_customer')->nullable();
            $table->string('phone_customer')->nullable();
            $table->string('email_customer')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create master_users table
        Schema::create('master_users', function (Blueprint $table) {
            $table->id('user_id');
            $table->integer('company_id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('jwt_token', 512)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create master_payment_methods table
        Schema::create('master_payment_methods', function (Blueprint $table) {
            $table->id('payment_method_id');
            $table->string('name_payment_method')->nullable();
            $table->text('description_payment_method')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create transaction_sales table
        Schema::create('transaction_sales', function (Blueprint $table) {
            $table->id('transaction_sales_id');
            $table->integer('branch_id');
            $table->integer('payment_method_id');
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->integer('sales_type_id');
            $table->string('number')->nullable();
            $table->datetime('date')->nullable();
            $table->text('notes')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('discount_amount')->nullable();
            $table->double('discount_percentage')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('change_amount')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        // Create master_companies table
        Schema::create('master_companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->string('name_company')->nullable();
            $table->string('phone_company')->nullable();
            $table->string('address_company')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_companies');
        Schema::dropIfExists('transaction_sales');
        Schema::dropIfExists('master_payment_methods');
        Schema::dropIfExists('master_users');
        Schema::dropIfExists('master_customers');
        Schema::dropIfExists('master_items');
        Schema::dropIfExists('master_categories');
    }
};

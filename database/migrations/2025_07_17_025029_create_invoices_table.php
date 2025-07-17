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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice')->unique();
            $table->string('perusahaan');
            $table->decimal('nominal', 12, 2);
            $table->date('jatuh_tempo');
            $table->enum('status_pelunasan', ['Paid', 'Unpaid', 'Partial'])->default('Unpaid');
            $table->decimal('nominal_dp', 12, 2)->default(0);
            $table->date('jatuh_tempo_dp')->nullable();
            $table->enum('status_dp', ['Paid', 'Unpaid', 'Not Required'])->default('Not Required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

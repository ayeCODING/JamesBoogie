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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->unsignedBigInteger('order_id');
            $table->string('id_transaksi_midtrans'); // ID transaksi dari Midtrans
            $table->string('metode_pembayaran');
            $table->string('status_pembayaran')->default('Pending'); // Default status
            $table->dateTime('tanggal_transaksi');
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};

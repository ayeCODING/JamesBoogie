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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('pengiriman_id');
            $table->unsignedBigInteger('order_id');
            $table->string('kurir'); // Nama kurir (misalnya, JNE, TIKI, POS)
            $table->string('layanan'); // Jenis layanan (misalnya, REG, YES)
            $table->decimal('ongkos_kirim', 10, 2);
            $table->string('no_resi')->nullable(); // Nomor resi pengiriman
            $table->string('status_pengiriman')->default('Diproses'); //
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};

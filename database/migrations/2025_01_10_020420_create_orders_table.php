<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id(); // id internal
        $table->string('order_id')->unique(); //
        $table->unsignedBigInteger('user_id');
        $table->integer('total');
        $table->string('status')->default('pending'); // pending, success, failed
        $table->json('payload')->nullable(); // simpan respon Midtrans
        $table->timestamps();
        
        $table->foreign('user_id')->references('id')->on('users');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

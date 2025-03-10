<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'jumlah',
        'harga',
        'total',
        'alamat',
        'tanggal_pesanan',
        'status',

    ];

    // Relasi ke tabel orders (satu detail pesanan dimiliki oleh satu pesanan)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Relasi ke tabel products (satu detail pesanan dimiliki oleh satu produk)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

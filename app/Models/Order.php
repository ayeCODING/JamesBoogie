<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tanggal_pesanan',
        'total_harga',
        'status_pesanan',
    ];

    // Relasi ke tabel users (satu pesanan dimiliki oleh satu pelanggan)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tabel order_details (satu pesanan bisa memiliki banyak detail pesanan)
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    // Relasi ke tabel transactions (satu pesanan bisa memiliki satu transaksi)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'order_id');
    }

    // Relasi ke tabel shipments (satu pesanan bisa memiliki satu pengiriman)
    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'order_id');
    }
}

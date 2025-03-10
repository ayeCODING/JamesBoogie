<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'order_id',
        'id_transaksi_midtrans',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_transaksi',
    ];

    // Relasi ke tabel orders (satu transaksi dimiliki oleh satu pesanan)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

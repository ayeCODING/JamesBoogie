<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = [
        'order_id',
        'kurir',
        'layanan',
        'ongkos_kirim',
        'no_resi',
        'status_pengiriman',
    ];

    // Relasi ke tabel orders (satu pengiriman dimiliki oleh satu pesanan)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}

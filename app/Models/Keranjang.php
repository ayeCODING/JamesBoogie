<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    // Menyesuaikan nama tabel
    protected $table = 'keranjangs';

    // Menentukan primary key
    protected $primaryKey = 'keranjang_id';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'harga',
        'status_keranjang',
        'subtotal',
    ];

    // Aktifkan timestamps (created_at & updated_at)
    public $timestamps = true;

    // Relasi ke model User (Setiap keranjang dimiliki oleh seorang user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi ke model Produk (Setiap keranjang berisi satu produk)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }
}

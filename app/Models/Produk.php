<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Jika nama tabel sesuai dengan konvensi Laravel (plural dari nama model),
     * properti ini tidak perlu diisi. Namun, jika berbeda, Anda perlu mendefinisikannya.
     */
    protected $table = 'produks';

    /**
     * Kunci primer tabel.
     * Jika kunci primer adalah `id`, properti ini tidak perlu diisi.
     * Karena Anda menggunakan `produk_id` sebagai kunci primer, Anda perlu mendefinisikannya.
     */
    protected $primaryKey = 'produk_id';

    /**
     * Menentukan apakah kunci primer adalah auto-incrementing.
     * Default-nya adalah `true`, tetapi jika Anda menggunakan UUID atau kunci primer non-integer,
     * Anda perlu mengubahnya menjadi `false`.
     */
    public $incrementing = true;

    /**
     * Tipe data kunci primer.
     * Default-nya adalah `int`, tetapi jika Anda menggunakan tipe data lain, Anda perlu mendefinisikannya.
     */
    protected $keyType = 'int';

    /**
     * Kolom yang dapat diisi (mass assignable).
     * Ini adalah kolom yang dapat diisi menggunakan metode `create` atau `update`.
     */

     public function Sluggable(): array
     {
         return [
             'slug' => [
                 'source' => 'nama_produk'
             ]
         ];
     }



     public function deleteImage()
     {
         if ($this->gambar && file_exists(public_path('images/produk' . $this->gambar))) {
             return unlink(public_path('images/produk' . $this->gambar));
         }
     }

    protected $fillable = [
        'nama_produk',
        'gambar',
        'harga',
        'stok',
        'deskripsi',
        'kategori_id',
        'brand_name',
    ];

    /**
     * Kolom yang harus disembunyikan saat model di-convert ke array atau JSON.
     * Contoh: password, token, dll.
     */
    protected $hidden = [
        // Jika ada kolom yang perlu disembunyikan, tambahkan di sini.
    ];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     * Contoh: `harga` di-cast ke `decimal`, `stok` ke `integer`, dll.
     */
    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
    ];

    /**
     * Relasi ke model `Kategori`.
     * Asumsikan Anda memiliki model `Kategori` dan tabel `kategoris`.
     */
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(orderDetail::class, 'produk_id');
    }
}

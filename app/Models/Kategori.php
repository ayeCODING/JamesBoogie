<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Nama tabel
    protected $table = 'kategoris';

    // Primary key
    protected $primaryKey = 'kategori_id';

    // Apakah primary key auto-incrementing?
    public $incrementing = true;

    // Timestamps
    public $timestamps = true;

    // Kolom yang boleh diisi
    protected $fillable = ['nama_kategori', 'slug'];

    // Jika Anda ingin menggunakan $guarded, cukup gunakan ini:
    // protected $guarded = [];
}

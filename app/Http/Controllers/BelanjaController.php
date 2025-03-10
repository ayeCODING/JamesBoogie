<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Menampilkan daftar produk dengan kategori.
     */
    public function index(Request $request)
    {
        $kategori_id = $request->kategori_id;
        $kategori = Kategori::all(); // Ambil semua kategori

        // Jika ada kategori yang dipilih, filter produk berdasarkan kategori
        if ($kategori_id) {
            $produks = Produk::where('kategori_id', $kategori_id)->latest()->paginate(12);
        } else {
            $produks = Produk::latest()->paginate(12);
        }

        return view('belanja.index', compact('produks', 'kategori', 'kategori_id'));
    }
    public function show($slug)
{
    $produk = Produk::where('slug', $slug)->firstOrFail();
    return view('belanja.show', compact('produk'));
}

}

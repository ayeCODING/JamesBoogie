<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class WelcomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Ambil semua data produk dari database
        return view('welcome', compact('produk')); // Kirim data produk ke view
    }
}

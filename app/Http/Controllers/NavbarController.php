<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Keranjang;
use App\Models\Kategori;

class NavbarController extends Controller
{
    public function compose()
    {
        $totalItem = 0;
        if (Auth::check()) {
            $totalItem = Keranjang::where('user_id', Auth::id())
                        ->where('status_keranjang', 'active')
                        ->sum('jumlah');
        }

        $kategoris = Kategori::all(); // kalau kamu juga ambil kategori

        View::share([
            'total_keranjang' => $totalItem,
            'kategoris' => $kategoris,
        ]);
    }
}

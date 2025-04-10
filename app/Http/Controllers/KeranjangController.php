<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('user_id', auth()->id())->with('produk')->get();
        return view('keranjang.index', compact('keranjang'));
    }

    public function store(Request $request)
    {
        $produk_id = $request->get('produk_id');
        $jumlah = $request->get('jumlah');

        $keranjang = Keranjang::where('produk_id', $produk_id)
            ->where('user_id', auth()->id())
            ->first();

            if ($keranjang) {
                $keranjang->jumlah += $jumlah;
                $keranjang->save();
                Alert::success('Produk berhasil diperbarui di keranjang', 'Good Job')->autoclose(1500);
            } else {
                $produk = Produk::findOrFail($produk_id);

$keranjang = new Keranjang;
$keranjang->produk_id = $produk_id;
$keranjang->jumlah = $jumlah;
$keranjang->harga = $produk->harga;
$keranjang->user_id = auth()->id();
$keranjang->save();

                Alert::success('Produk berhasil ditambahkan ke keranjang', 'Good Job')->autoclose(1500);
            }
            
        return redirect()->route('keranjang.index');
    }

    public function delete($id)
    {
        $keranjang = Keranjang::where('keranjang_id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $keranjang->delete();

        Alert::success('Produk berhasil dihapus dari keranjang', 'Good Job')->autoclose(1500);
        return redirect()->route('keranjang.index');
    }

    public function updateQuantity(Request $request, $id)
    {
        $item = Keranjang::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($item) {
            $item->jumlah = $request->jumlah;
            $item->save();

            $subtotal = $item->produk->harga * $item->jumlah;
            $totalKeranjang = Keranjang::where('user_id', auth()->id())
                ->get()
                ->sum(function($cart) {
                    return $cart->produk->harga * $cart->jumlah;
                });

            return response()->json([
                'success' => true,
                'subtotal' => $subtotal,
                'total_keranjang' => $totalKeranjang
            ]);
        }

        return response()->json(['success' => false], 404);
    }
}

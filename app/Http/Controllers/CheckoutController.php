<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\RajaOngkir;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Config;   

class CheckoutController extends Controller
{
    protected $rajaOngkir;

    public function __construct()
    {
        $this->rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
    }

    public function index()
    {
        $user = Auth::user();
        $keranjang = Keranjang::with('produk')->where('user_id', $user->id)->get();

        $subtotal = $keranjang->sum(function($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $provinsi = $this->rajaOngkir->provinsi()->all();

        return view('frontend.checkout', compact('keranjang', 'subtotal', 'provinsi'));
    }

    public function getCities($province_id)
    {
        $cities = $this->rajaOngkir->kota()->dariProvinsi($province_id);
        return response()->json($cities);
    }

    public function getShippingCost(Request $request)
    {
        $origin = env('RAJAONGKIR_ORIGIN'); // kota asal
        $destination = $request->destination;
        $weight = $request->weight; // berat total keranjang
        $courier = $request->courier;

        $ongkir = $this->rajaOngkir->ongkir(
            [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]
        )->get();

        return response()->json($ongkir);
    }

    public function pay(Request $request)
    {
        $user = Auth::user();
        $keranjang = Keranjang::with('produk')->where('user_id', $user->id)->get();

        $subtotal = $keranjang->sum(function($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $total = $subtotal + $request->ongkir;

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
        return response()->json(['token' => $snapToken]);
    }
}

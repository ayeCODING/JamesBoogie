<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use App\Models\Order;
use Illuminate\Support\Str;

class MidtransController extends Controller
{
    protected function setMidtransConfig()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.sanitized');
        Config::$is3ds = config('midtrans.3ds');
    }

    public function checkout()
{
    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = config('midtrans.is_production');
    \Midtrans\Config::$isSanitized = config('midtrans.sanitized');
    \Midtrans\Config::$is3ds = config('midtrans.3ds');

    $user = Auth::user();

    // Ambil isi keranjang user
    $items = Keranjang::with('produk')->where('user_id', $user->id)->get();

    if ($items->isEmpty()) {
        return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong!');
    }

    // Hitung total harga
    $total = $items->sum(function ($item) {
        return $item->produk->harga * $item->jumlah;
    });

    // Buat order_id unik
    $order_id = 'ORDER-' . uniqid();

    // Buat parameter transaksi
    $params = [
        'transaction_details' => [
            'order_id' => $order_id,
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => $user->name,
            'email' => $user->email,
        ],
        'item_details' => $items->map(function ($item) {
            return [
                'id' => $item->produk->produk_id,
                'price' => $item->produk->harga,
                'quantity' => $item->jumlah,
                'name' => $item->produk->nama_produk,
            ];
        })->toArray(),
    ];

    // Generate Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Simpan order ke database
    Order::create([
        'order_id' => $order_id,
        'user_id' => $user->id,
        'total' => $total,
        'status' => 'pending',
    ]);

    // Tampilkan halaman checkout dengan Snap Token
    return view('checkout', [
        'snapToken' => $snapToken
    ]);
}



    public function callback(Request $request)
    {
        $this->setMidtransConfig();

        $notif = new Notification();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $order = Order::where('order_id', $order_id)->first();

        if (!$order) return response()->json(['message' => 'Order not found'], 404);

        // Update status
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                $order->status = ($fraud == 'challenge') ? 'challenge' : 'success';
            }
        } elseif ($transaction == 'settlement') {
            $order->status = 'success';
            Keranjang::where('user_id', $order->user_id)->delete();
        } elseif ($transaction == 'pending') {
            $order->status = 'pending';
        } elseif (in_array($transaction, ['deny', 'expire', 'cancel'])) {
            $order->status = 'failed';
        }

        $order->payload = json_encode($notif);
        $order->save();

        return response()->json(['message' => 'Callback processed']);
    }
}

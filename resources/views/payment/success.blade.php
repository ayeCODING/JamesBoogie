@extends('layouts.frontend')

@section('content')
<div class="container py-5 text-center">
    <h1 class="text-success mb-3">🎉 Pembayaran Berhasil!</h1>
    <p class="lead">Terima kasih telah berbelanja di <strong>James Boogie</strong>.</p>
    <p>Pesanan kamu sedang kami proses. Detail transaksi sudah dikirim ke email kamu.</p>
    <a href="{{ route('welcome') }}" class="btn btn-primary mt-4">Kembali ke Beranda</a>
</div>
@endsection

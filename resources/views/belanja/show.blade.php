@extends('layouts.frontend')

@section('content')
    <div class="produk-detail">
        <h2>{{ $produk->nama_produk }}</h2>
        <img src="{{ asset('images/produk/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="300">
        <p>Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
        <p>Stok: {{ $produk->stok }}</p>
        <p>Deskripsi: {{ $produk->deskripsi }}</p>

        <a href="{{ route('belanja.index') }}">← Kembali ke Belanja</a>
    </div>
@endsection

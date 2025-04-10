@extends('layouts.frontend')

@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('belanja.index') }}">Belanja</a></li>
                    <li>Detail Produk</li>
                </ul>
            </div>
            <h1>{{ $produk->nama_produk }}</h1>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="prod_pics text-center"> <!-- Tambahkan class text-center untuk membuat gambar di tengah -->
                    <img src="{{ asset('images/produk/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="img-fluid product-image">
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="prod_info version_2">
                        <span class="rating">
                            <i class="icon-star voted"></i>
                            <i class="icon-star voted"></i>
                            <i class="icon-star voted"></i>
                            <i class="icon-star voted"></i>
                            <i class="icon-star"></i>
                            <em>4 reviews</em>
                        </span>
                        <p><small>Deskripsi:</small><br>{{ $produk->deskripsi }}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="prod_options version_2">
                        <div class="row">
                            <label class="col-xl-7 col-lg-5 col-md-6 col-6 pt-0"><strong>Harga</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                                <div class="price_main">
                                    <span class="new_price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-7 col-lg-5 col-md-6 col-6"><strong>Stok</strong></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                                <p>{{ $produk->stok }}</p> <!-- Menampilkan stok sebagai teks biasa -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6">
                                <div class="btn_add_to_cart">
                                    <a href="{{ route('belanja.index') }}" class="btn_1 outline">Kembali ke Belanja</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="btn_add_to_cart">
                                    <a href="#" class="btn_1">Masuk ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /bg_white -->
</main>
<!-- /main -->
@endsection

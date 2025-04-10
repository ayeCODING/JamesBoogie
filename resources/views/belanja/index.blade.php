@extends('layouts.frontend')

@section('styles')
    <link href="{{ asset('frontend/css/listing.css') }}" rel="stylesheet">
    <style>
        /* Tambahkan CSS tema gelap di sini */
        body {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .top_banner {
            background-color: #121212;
        }

        .top_banner h1 {
            color: #ffffff;
        }

        .grid_item {
            background-color: #262626;
            border: 1px solid #333333;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .grid_item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .grid_item h3 {
            color: #ffffff;
        }

        .grid_item .price_box .new_price {
            color: #ff5722;
        }

        .btn_1 {
            background-color: #00FFFF;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn_1:hover {
            background-color: #e61919;
        }

        .pagination__wrapper .page-link {
            background-color: #262626;
            border: 1px solid #333333;
            color: #ffffff;
        }

        .pagination__wrapper .page-link:hover {
            background-color: #ff5722;
            border-color: #ff5722;
            color: #ffffff;
        }

        .pagination__wrapper .page-item.active .page-link {
            background-color: #ff5722;
            border-color: #ff5722;
            color: #ffffff;
        }

        .toolbox {
            background-color: #262626;
            border-bottom: 1px solid #333333;
        }

        .toolbox .sort_select select {
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #ffffff;
        }

        .toolbox .btn_filter {
            color: #ffffff;
            background-color: #ff5722;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .toolbox .btn_filter:hover {
            background-color: #e64a19;
        }

        .top_banner {
            position: relative;
            overflow: hidden;
        }

        .top_banner img {
            width: 100%;
            height: auto;
            display: block;
        }

        .top_banner .opacity-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(255, 255, 255);
            /* Overlay warna gelap */
        }

        .top_banner h1 {
            color: #ffffff;
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgb(255, 255, 255);
        }
    </style>
@endsection

@section('content')
    <div id="page">
        <main>
            <div class="container margin_30">
                <div class="top_banner version_2">
                    <div class="opacity-mask d-flex align-items-center" style="background-color: transparent;">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                {{-- <h2 class="text-black">BELANJA</h2> <!-- Hapus text-shadow --> --}}
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <img src="{{ asset('frontend/img/logo-jb.png') }}" class="img-fluid" alt=""
                            style="max-width: 600px; height: auto;">
                    </div>
                </div>
                <div id="stick_here"></div>
                <div class="toolbox elemento_stick version_2">
                    <div class="container">
                        <ul class="clearfix">
                            <li>
                                <div class="sort_select">
                                    <select name="sort" id="sort">
                                        <option value="popularity" selected="selected">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <a href="#0" class="btn_filter"><i class="ti-filter"></i> Filter</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row small-gutters">
                    <div style="text-align: center;">
                        <h1 class="text-white" style="font-family: 'Playfair Display', serif;">Belanja</h1>
                    </div>
                    @foreach ($produks as $produk)
                        <div class="col-6 col-md-4 col-xl-3">
                            <div class="grid_item">
                                <figure>
                                    <a href="{{ route('belanja.show', $produk->slug) }}">
                                        <img class="img-fluid lazyload"
                                            data-src="{{ asset('images/produk/' . $produk->gambar) }}"
                                            alt="{{ $produk->nama_produk }}">
                                    </a>
                                </figure>
                                <a href="{{ route('belanja.show', $produk->slug) }}">
                                    <h3>{{ $produk->nama_produk }}</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="btn_add_to_cart d-flex justify-content-between">
                                    <a href="{{ route('belanja.show', $produk->slug) }}" class="btn_1 me-2">Lihat Detail</a>
                                    <form action="{{ route('keranjang.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $produk->produk_id }}">
                                        <input type="hidden" name="jumlah" value="1">
                                        <button type="submit" class="btn_1">+ Keranjang</button>
                                    </form>
                                </div>
                                                               
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination__wrapper">
                    {{ $produks->links() }}
                </div>
            </div>
        </main>
        <script src="{{ asset('frontend/js/sticky_sidebar.min.js') }}"></script>
        <script src="{{ asset('frontend/js/specific_listing.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    </div>
@endsection

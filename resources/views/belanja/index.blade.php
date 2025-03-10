@extends('layouts.frontend')

@section('styles')
    <link href="{{ asset('frontend/css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="page">
    <main>
        <div class="container margin_30">
            <div class="top_banner version_2">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <h1>Belanja</h1>
                        </div>
                    </div>
                </div>
                <img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
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
                    </ul>
                </div>
            </div>
            <div class="row small-gutters">
                @foreach($produks as $produk)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                <a href="{{ route('belanja.show', $produk->slug) }}">
                                    <img class="img-fluid lazy" src="{{ asset('images/produk/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
                                </a>
                            </figure>
                            <a href="{{ route('belanja.show', $produk->slug) }}">
                                <h3>{{ $produk->nama_produk }}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
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
    <script src="{{ asset ('frontend/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset ('frontend/js/specific_listing.js') }}"></script>
</div>
@endsection

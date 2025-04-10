@extends('layouts.frontend')
@section('content')
<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Images</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-jumlah">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $overallTotal = 0;
                            @endphp
                            @foreach($keranjang as $item)
                            @php
                            $totalHarga = $item->produk->harga * $item->jumlah;
                            $overallTotal += $totalHarga;
                            $stokProduk = $item->produk->stok;
                            @endphp
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{ asset('images/produk/'.$item->produk->gambar) }}" alt="Image"
                                        class="img-fluid" style="height: 100px">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ $item->produk->nama_produk }}</h2>
                                </td>
                                <td>{{ number_format($item->produk->harga, 2, '.', ',') }}</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center jumlah-container"
                                        style="max-width: 120px;">
                                        <input type="number" class="form-control text-center jumlah-amount"
                                            value="{{ $item->jumlah }}" placeholder=""
                                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                                            min="1" max="{{ $stokProduk }}"
                                            onchange="updateTotal(this, {{ $item->produk->harga }}, {{ $stokProduk }}, {{ $item->id }})">
                                    </div>
                                </td>
                                <td class="total-harga">{{ number_format($totalHarga, 2, '.', ',') }}</td>
                                <td>
                                    <form action="{{ route('keranjang.delete', $item->keranjang_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-black btn-sm btn-block"
                            onclick="window.location='{{ route('belanja.index') }}'">Add Product</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Total Cart</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black" id="cart-subtotal">{{ number_format($overallTotal, 2, '.',
                                    ',') }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black" id="cart-total">{{ number_format($overallTotal, 2, '.', ',')
                                    }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="#">
                                    <button class="btn btn-black btn-lg py-3 btn-block">Proceed To
                                        Payment</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function updateTotal(element, price, stock, id) {
        var jumlah = element.value;
        if (jumlah < 1) {
            jumlah = 1;
            element.value = 1;
        } else if (jumlah > stok) {
            jumlah = stok;
            element.value = stok;
            alert('Quantity exceeds available stock.');
        }
        var total = harga * jumlah;
        var totalHargaElement = element.closest('tr').querySelector('.total-harga');
        totalHargaElement.innerHTML = formatNumber(total);
        updateOverallTotal();

        // Send AJAX request to update quantity in the database
        fetch(`/keranjang/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                jumlah: jumlah
            })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Failed to update quantity in the database.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating quantity.');
        });
    }

    function updateOverallTotal() {
        var overallTotal = 0;
        document.querySelectorAll('.total-harga').forEach(function(element) {
            overallTotal += parseFloat(element.innerHTML.replace(/,/g, ''));
        });
        document.getElementById('cart-subtotal').innerHTML = formatNumber(overallTotal);
        document.getElementById('cart-total').innerHTML = formatNumber(overallTotal);
    }

    function formatNumber(number) {
        return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }
</script>

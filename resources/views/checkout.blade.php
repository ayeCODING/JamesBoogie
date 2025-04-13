@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <form id="checkout-form">
        <div class="row">
            <div class="col-md-6">
                <h5>Alamat Pengiriman</h5>

                <div class="mb-3">
                    <label for="provinsi">Provinsi</label>
                    <select id="provinsi" name="provinsi_id" class="form-control"></select>
                </div>

                <div class="mb-3">
                    <label for="kota">Kota</label>
                    <select id="kota" name="kota_id" class="form-control"></select>
                </div>

                <div class="mb-3">
                    <label for="kurir">Kurir</label>
                    <select id="kurir" name="kurir" class="form-control">
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS Indonesia</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="layanan">Layanan</label>
                    <select id="layanan" name="layanan" class="form-control"></select>
                </div>
            </div>

            <div class="col-md-6">
                <h5>Ringkasan Belanja</h5>

                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal Produk</span>
                        <strong id="subtotal">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Ongkir</span>
                        <strong id="ongkir">Rp 0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong id="total">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </li>
                </ul>

                <button type="button" id="pay-button" class="btn btn-success btn-lg btn-block">Bayar Sekarang</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    let subtotal = {{ $subtotal }};
    let ongkir = 0;

    document.addEventListener("DOMContentLoaded", function () {
        fetch('/api/rajaongkir/provinces')
            .then(res => res.json())
            .then(data => {
                data.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.province_id;
                    option.text = prov.province;
                    document.getElementById('provinsi').appendChild(option);
                });
            });

        document.getElementById('provinsi').addEventListener('change', function () {
            let provId = this.value;
            fetch(`/api/rajaongkir/cities/${provId}`)
                .then(res => res.json())
                .then(data => {
                    let kota = document.getElementById('kota');
                    kota.innerHTML = '';
                    data.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.city_id;
                        option.text = city.type + ' ' + city.city_name;
                        kota.appendChild(option);
                    });
                });
        });

        document.getElementById('kurir').addEventListener('change', getShipping);
        document.getElementById('kota').addEventListener('change', getShipping);

        function getShipping() {
            let kotaId = document.getElementById('kota').value;
            let kurir = document.getElementById('kurir').value;
            if (!kotaId || !kurir) return;

            fetch(`/api/rajaongkir/cost`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ destination: kotaId, courier: kurir })
            })
                .then(res => res.json())
                .then(data => {
                    let layanan = document.getElementById('layanan');
                    layanan.innerHTML = '';
                    data.forEach(service => {
                        let option = document.createElement('option');
                        option.value = service.cost[0].value;
                        option.text = `${service.service} - Rp ${service.cost[0].value}`;
                        layanan.appendChild(option);
                    });
                    layanan.dispatchEvent(new Event('change'));
                });
        }

        document.getElementById('layanan').addEventListener('change', function () {
            ongkir = parseInt(this.value);
            document.getElementById('ongkir').innerText = 'Rp ' + ongkir.toLocaleString('id-ID');
            document.getElementById('total').innerText = 'Rp ' + (subtotal + ongkir).toLocaleString('id-ID');
        });

        document.getElementById('pay-button').addEventListener('click', function () {
            const kotaId = document.getElementById('kota').value;
            const kurir = document.getElementById('kurir').value;
            const layanan = document.getElementById('layanan').options[document.getElementById('layanan').selectedIndex].text;

            fetch('/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ kota_id: kotaId, kurir, layanan, ongkir })
            })
                .then(res => res.json())
                .then(data => {
                    snap.pay(data.snapToken, {
                        onSuccess: function(result){ window.location.href = '/payment/success'; },
                        onPending: function(result){ window.location.href = '/payment/pending'; },
                        onError: function(result){ alert('Pembayaran gagal!'); },
                        onClose: function(){ alert('Kamu menutup popup tanpa menyelesaikan pembayaran.'); }
                    });
                });
        });
    });
</script>
@endpush

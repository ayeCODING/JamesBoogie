@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <div class="text-center">
        <button id="pay-button" class="btn btn-success btn-lg">Bayar Sekarang</button>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('pay-button').addEventListener('click', function () {
            window.snap.pay(@json($snapToken), {
                onSuccess: function(result){
                    console.log(result);
                    window.location.href = '/payment/success';
                },
                onPending: function(result){
                    console.log(result);
                    window.location.href = '/payment/pending';
                },
                onError: function(result){
                    console.log(result);
                    alert('Pembayaran gagal!');
                },
                onClose: function(){
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran.');
                }
            });
        });
    });
</script>
@endpush


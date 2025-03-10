@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded-lg border-0">
        <div class="card-header bg-white text-dark border-bottom">
            <h5 class="mb-0"><i class="bx bx-edit"></i> Edit Produk</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produk.update', $produk->slug) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                        value="{{ $produk->nama_produk }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"
                        rows="3">{{ $produk->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori_id" name="kategori_id" required>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->kategori_id }}" {{ $produk->kategori_id == $item->kategori_id ?
                                'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="brand_name" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                        value="{{ $produk->brand_name }}" required>
                </div>

                <button type="submit" class="btn btn-dark">Update</button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection
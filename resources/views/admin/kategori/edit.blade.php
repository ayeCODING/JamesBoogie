@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm rounded-lg border-0">
            <div class="card-header bg-white text-dark">
                <h5 class="mb-0"><i class="bx bx-edit"></i> Edit Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori.update', $kategori->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required onkeyup="generateSlug()">
                    </div>

                    <button type="submit" class="btn btn-dark">Simpan</button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function generateSlug() {
            let nama_kategori = document.getElementById("nama_kategori").value;
            let slug = nama_kategori.toLowerCase().replace(/[^\w\s-]/g, '').replace(/\s+/g, '-').replace(/^-+|-+$/g, '');
            document.getElementById("slug").value = slug;
        }
    </script>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'desc')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ], [
            'nama_kategori.required' => 'Nama Kategori harus diisi.',
            'nama_kategori.unique' => 'Nama Kategori sudah ada.',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->slug = Str::slug($request->input('nama_kategori')); // Slug otomatis
        $kategori->save();

        Alert::success('Success', 'Kategori berhasil ditambahkan.');
        return redirect()->route('admin.kategori.index');
    }

    /**
     * Menampilkan detail kategori.
     */
    public function show(Kategori $kategori)
    {
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Menampilkan form edit kategori berdasarkan slug.
     */
    public function edit($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, $slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $kategori->kategori_id . ',kategori_id',
        ]);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($request->nama_kategori);
        $kategori->save();

        Alert::success('Success', 'Kategori berhasil diperbarui.');
        return redirect()->route('admin.kategori.index');
    }

    /**
     * Menghapus kategori berdasarkan slug.
     */
    public function destroy($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $kategori->delete();

        Alert::success('Success', 'Kategori berhasil dihapus.');
        return redirect()->route('admin.kategori.index');
    }
}

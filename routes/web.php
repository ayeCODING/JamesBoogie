<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\NavbarController;
use App\Http\Middleware\IsAdmin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);

Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
Route::get('/belanja/{slug}', [BelanjaController::class, 'show'])->name('belanja.show');

Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::delete('keranjang/{id}', [KeranjangController::class, 'delete'])->name('keranjang.delete');
Route::post('/keranjang/update/{keranjang.index}', [KeranjangController::class, 'updateQuantity'])->name('keranjang.update');


Route::middleware(['auth', 'is_admin:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //produk
    Route::resource('produk', ProdukController::class);
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/{slug}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/produk/{slug}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{slug}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{slug}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    //kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{slug}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{slug}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{slug}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{slug}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});
// Route::get('/user/dashboard', function () {
//     return view('user.dashboard');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

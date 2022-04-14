<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CostumerCrudController;
use App\Http\Controllers\KategoriTanamanController;
use App\Http\Controllers\KategoriPerlengkapanController;
use App\Http\Controllers\PengeluaranCrudController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\PenjualanTanamanController;
use App\Http\Controllers\PenjualanPerlengkapanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengeluaranController;
use App\Models\KategoriTanaman;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// })->name('home');

// Route::get('/autofill-tanaman.php', function () {
//     return view('autofill-tanaman');
// })->name('autofill-tanaman');

// Route::get('/autofill-perlengkapan.php', function () {
//     return view('autofill-perlengkapan');
// })->name('autofill-perlengkapan');

Route::get('/login', function () {
    return view('/login/login');
})->name('login');

Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('home');

    Route::get('/autofill-tanaman.php', function () {
        return view('autofill-tanaman');
    })->name('autofill-tanaman');

    Route::get('/autofill-perlengkapan.php', function () {
        return view('autofill-perlengkapan');
    })->name('autofill-perlengkapan');

    // routes admin
    Route::get('/data-admin', [CrudController::class, 'index'])->name('crud');
    Route::get('/data-admin/tambah', [CrudController::class, 'tambah'])->name('crud-tambah');
    Route::post('/data-admin/simpan', [CrudController::class, 'simpan'])->name('crud-simpan');
    Route::delete('/data-admin/delete/{id}', [CrudController::class, 'delete'])->name('crud-delete');
    Route::get('/data-admin/{id}/edit', [CrudController::class, 'edit'])->name('crud-edit');
    Route::patch('/data-admin/{id}', [CrudController::class, 'update'])->name('crud-update');

    // routes costumers
    Route::get('/data-costumer', [CostumerCrudController::class, 'index'])->name('crud-costumer');
    Route::get('/data-costumer/tambah', [CostumerCrudController::class, 'tambah'])->name('costumer-tambah');
    Route::post('/data-costumer/simpan', [CostumerCrudController::class, 'simpan'])->name('costumer-simpan');
    Route::delete('/data-costumer/delete/{id}', [CostumerCrudController::class, 'delete'])->name('costumer-delete');
    Route::get('/data-costumer/{id}/edit', [CostumerCrudController::class, 'edit'])->name('costumer-edit');
    Route::patch('/data-costumer/{id}', [CostumerCrudController::class, 'update'])->name('costumer-update');

    // routes pengeluaran
    Route::get('/data-pengeluaran', [PengeluaranCrudController::class, 'index'])->name('crud-pengeluaran');
    Route::get('/data-pengeluaran/tambah', [PengeluaranCrudController::class, 'tambah'])->name('pengeluaran-tambah');
    Route::post('/data-pengeluaran/simpan', [PengeluaranCrudController::class, 'simpan'])->name('pengeluaran-simpan');
    Route::delete('/data-pengeluaran/delete/{id}', [PengeluaranCrudController::class, 'delete'])->name('pengeluaran-delete');
    Route::get('/data-pengeluaran/{id}/edit', [PengeluaranCrudController::class, 'edit'])->name('pengeluaran-edit');
    Route::patch('/data-pengeluaran/{id}', [PengeluaranCrudController::class, 'update'])->name('pengeluaran-update');
    // Route::resource('/data-pengeluaran', PengeluaranController::class);

    // routes kategori tanaman
    Route::get('/data-kategori/tanaman', [KategoriTanamanController::class, 'index'])->name('crud-kategori-tanaman');
    Route::get('/data-kategori/tanaman/tambah', [KategoriTanamanController::class, 'tambah'])->name('kategori-tanaman-tambah');
    Route::post('/data-kategori/tanaman/simpan', [KategoriTanamanController::class, 'simpan'])->name('kategori-tanaman-simpan');
    Route::delete('/data-kategori/tanaman/delete/{id}', [KategoriTanamanController::class, 'delete'])->name('kategori-tanaman-delete');
    Route::get('/data-kategori/tanaman/{id}/edit', [KategoriTanamanController::class, 'edit'])->name('kategori-tanaman-edit');
    Route::patch('/data-kategori/tanaman/{id}', [KategoriTanamanController::class, 'update'])->name('kategori-tanaman-update');

    // routes kategori perlengkapan
    Route::get('/data-kategori/perlengkapan', [KategoriPerlengkapanController::class, 'index'])->name('crud-kategori-perlengkapan');
    Route::get('/data-kategori/perlengkapan/tambah', [KategoriPerlengkapanController::class, 'tambah'])->name('kategori-perlengkapan-tambah');
    Route::post('/data-kategori/perlengkapan/simpan', [KategoriPerlengkapanController::class, 'simpan'])->name('kategori-perlengkapan-simpan');
    Route::delete('/data-kategori/perlengkapan/delete/{id}', [KategoriPerlengkapanController::class, 'delete'])->name('kategori-perlengkapan-delete');
    Route::get('/data-kategori/perlengkapan/{id}/edit', [KategoriPerlengkapanController::class, 'edit'])->name('kategori-perlengkapan-edit');
    Route::patch('/data-kategori/perlengkapan/{id}', [KategoriPerlengkapanController::class, 'update'])->name('kategori-perlengkapan-update');

    // routes tanaman
    Route::get('/data-tanaman', [TanamanController::class, 'index'])->name('crud-tanaman');
    Route::get('/data-tanaman/tambah', [TanamanController::class, 'tambah'])->name('tanaman-tambah');
    Route::post('/data-tanaman/simpan', [TanamanController::class, 'simpan'])->name('tanaman-simpan');
    Route::get('/data-tanaman/detail/{id}', [TanamanController::class, 'detail'])->name('tanaman-detail');
    Route::delete('/data-tanaman/delete/{id}', [TanamanController::class, 'delete'])->name('tanaman-delete');
    Route::get('/data-tanaman/{id}/edit', [TanamanController::class, 'edit'])->name('tanaman-edit');
    Route::patch('/data-tanaman/{id}', [TanamanController::class, 'update'])->name('tanaman-update');

    // routes perlengkapan
    Route::get('/data-perlengkapan', [PerlengkapanController::class, 'index'])->name('crud-perlengkapan');
    Route::get('/data-perlengkapan/tambah', [PerlengkapanController::class, 'tambah'])->name('perlengkapan-tambah');
    Route::post('/data-perlengkapan/simpan', [PerlengkapanController::class, 'simpan'])->name('perlengkapan-simpan');
    Route::get('/data-perlengkapan/detail/{id}', [PerlengkapanController::class, 'detail'])->name('perlengkapan-detail');
    Route::delete('/data-perlengkapan/delete/{id}', [PerlengkapanController::class, 'delete'])->name('perlengkapan-delete');
    Route::get('/data-perlengkapan/{id}/edit', [PerlengkapanController::class, 'edit'])->name('perlengkapan-edit');
    Route::patch('/data-perlengkapan/{id}', [PerlengkapanController::class, 'update'])->name('perlengkapan-update');

    // routes penjualan tanaman
    Route::get('/data-penjualan/tanaman', [PenjualanTanamanController::class, 'index'])->name('crud-penjualan-tanaman');
    Route::get('/data-penjualan/tanaman/tambah', [PenjualanTanamanController::class, 'tambah'])->name('penjualan-tanaman-tambah');
    Route::post('/data-penjualan/tanaman/simpan', [PenjualanTanamanController::class, 'simpan'])->name('penjualan-tanaman-simpan');
    Route::delete('/data-penjualan/tanaman/delete/{id}', [PenjualanTanamanController::class, 'delete'])->name('penjualan-tanaman-delete');
    Route::get('/data-penjualan/tanaman/{id}/edit', [PenjualanTanamanController::class, 'edit'])->name('penjualan-tanaman-edit');
    Route::patch('/data-penjualan/tanaman/{id}', [PenjualanTanamanController::class, 'update'])->name('penjualan-tanaman-update');
    Route::get('/data-penjualan/cetak-penjualan-tanaman', [PenjualanTanamanController::class, 'cetak_pdf'])->name('cetak-tanaman');
    // Route::get('/data-penjualan/cetak_penjualan_tanaman', 'PegawaiController@cetak_pdf');

    // routes penjualan perlengkapan
    Route::get('/data-penjualan/perlengkapan', [PenjualanPerlengkapanController::class, 'index'])->name('crud-penjualan-perlengkapan');
    Route::get('/data-penjualan/perlengkapan/tambah', [PenjualanPerlengkapanController::class, 'tambah'])->name('penjualan-perlengkapan-tambah');
    Route::post('/data-penjualan/perlengkapan/simpan', [PenjualanPerlengkapanController::class, 'simpan'])->name('penjualan-perlengkapan-simpan');
    Route::delete('/data-penjualan/perlengkapan/delete/{id}', [PenjualanPerlengkapanController::class, 'delete'])->name('penjualan-perlengkapan-delete');
    Route::get('/data-penjualan/perlengkapan/{id}/edit', [PenjualanPerlengkapanController::class, 'edit'])->name('penjualan-perlengkapan-edit');
    Route::patch('/data-penjualan/perlengkapan/{id}', [PenjualanPerlengkapanController::class, 'update'])->name('penjualan-perlengkapan-update');
    Route::get('/data-penjualan/cetak-penjualan-perlengkapan', [PenjualanPerlengkapanController::class, 'cetak_pdf'])->name('cetak-perlengkapan');
});

// Route::group(['middleware' => ['auth:administrator']], function () {
    
// });

// // routes admin
// Route::get('/data-admin', [CrudController::class, 'index'])->name('crud');
// Route::get('/data-admin/tambah', [CrudController::class, 'tambah'])->name('crud-tambah');
// Route::post('/data-admin/simpan', [CrudController::class, 'simpan'])->name('crud-simpan');
// Route::delete('/data-admin/delete/{id}', [CrudController::class, 'delete'])->name('crud-delete');
// Route::get('/data-admin/{id}/edit', [CrudController::class, 'edit'])->name('crud-edit');
// Route::patch('/data-admin/{id}', [CrudController::class, 'update'])->name('crud-update');

// // routes costumers
// Route::get('/data-costumer', [CostumerCrudController::class, 'index'])->name('crud-costumer');
// Route::get('/data-costumer/tambah', [CostumerCrudController::class, 'tambah'])->name('costumer-tambah');
// Route::post('/data-costumer/simpan', [CostumerCrudController::class, 'simpan'])->name('costumer-simpan');
// Route::delete('/data-costumer/delete/{id}', [CostumerCrudController::class, 'delete'])->name('costumer-delete');
// Route::get('/data-costumer/{id}/edit', [CostumerCrudController::class, 'edit'])->name('costumer-edit');
// Route::patch('/data-costumer/{id}', [CostumerCrudController::class, 'update'])->name('costumer-update');

// // routes pengeluaran
// Route::get('/data-pengeluaran', [PengeluaranCrudController::class, 'index'])->name('crud-pengeluaran');
// Route::get('/data-pengeluaran/tambah', [PengeluaranCrudController::class, 'tambah'])->name('pengeluaran-tambah');
// Route::post('/data-pengeluaran/simpan', [PengeluaranCrudController::class, 'simpan'])->name('pengeluaran-simpan');
// Route::delete('/data-pengeluaran/delete/{id}', [PengeluaranCrudController::class, 'delete'])->name('pengeluaran-delete');
// Route::get('/data-pengeluaran/{id}/edit', [PengeluaranCrudController::class, 'edit'])->name('pengeluaran-edit');
// Route::patch('/data-pengeluaran/{id}', [PengeluaranCrudController::class, 'update'])->name('pengeluaran-update');
// // Route::resource('/data-pengeluaran', PengeluaranController::class);

// // routes kategori tanaman
// Route::get('/data-kategori/tanaman', [KategoriTanamanController::class, 'index'])->name('crud-kategori-tanaman');
// Route::get('/data-kategori/tanaman/tambah', [KategoriTanamanController::class, 'tambah'])->name('kategori-tanaman-tambah');
// Route::post('/data-kategori/tanaman/simpan', [KategoriTanamanController::class, 'simpan'])->name('kategori-tanaman-simpan');
// Route::delete('/data-kategori/tanaman/delete/{id}', [KategoriTanamanController::class, 'delete'])->name('kategori-tanaman-delete');
// Route::get('/data-kategori/tanaman/{id}/edit', [KategoriTanamanController::class, 'edit'])->name('kategori-tanaman-edit');
// Route::patch('/data-kategori/tanaman/{id}', [KategoriTanamanController::class, 'update'])->name('kategori-tanaman-update');

// // routes kategori perlengkapan
// Route::get('/data-kategori/perlengkapan', [KategoriPerlengkapanController::class, 'index'])->name('crud-kategori-perlengkapan');
// Route::get('/data-kategori/perlengkapan/tambah', [KategoriPerlengkapanController::class, 'tambah'])->name('kategori-perlengkapan-tambah');
// Route::post('/data-kategori/perlengkapan/simpan', [KategoriPerlengkapanController::class, 'simpan'])->name('kategori-perlengkapan-simpan');
// Route::delete('/data-kategori/perlengkapan/delete/{id}', [KategoriPerlengkapanController::class, 'delete'])->name('kategori-perlengkapan-delete');
// Route::get('/data-kategori/perlengkapan/{id}/edit', [KategoriPerlengkapanController::class, 'edit'])->name('kategori-perlengkapan-edit');
// Route::patch('/data-kategori/perlengkapan/{id}', [KategoriPerlengkapanController::class, 'update'])->name('kategori-perlengkapan-update');

// // routes tanaman
// Route::get('/data-tanaman', [TanamanController::class, 'index'])->name('crud-tanaman');
// Route::get('/data-tanaman/tambah', [TanamanController::class, 'tambah'])->name('tanaman-tambah');
// Route::post('/data-tanaman/simpan', [TanamanController::class, 'simpan'])->name('tanaman-simpan');
// Route::get('/data-tanaman/detail/{id}', [TanamanController::class, 'detail'])->name('tanaman-detail');
// Route::delete('/data-tanaman/delete/{id}', [TanamanController::class, 'delete'])->name('tanaman-delete');
// Route::get('/data-tanaman/{id}/edit', [TanamanController::class, 'edit'])->name('tanaman-edit');
// Route::patch('/data-tanaman/{id}', [TanamanController::class, 'update'])->name('tanaman-update');

// // routes perlengkapan
// Route::get('/data-perlengkapan', [PerlengkapanController::class, 'index'])->name('crud-perlengkapan');
// Route::get('/data-perlengkapan/tambah', [PerlengkapanController::class, 'tambah'])->name('perlengkapan-tambah');
// Route::post('/data-perlengkapan/simpan', [PerlengkapanController::class, 'simpan'])->name('perlengkapan-simpan');
// Route::get('/data-perlengkapan/detail/{id}', [PerlengkapanController::class, 'detail'])->name('perlengkapan-detail');
// Route::delete('/data-perlengkapan/delete/{id}', [PerlengkapanController::class, 'delete'])->name('perlengkapan-delete');
// Route::get('/data-perlengkapan/{id}/edit', [PerlengkapanController::class, 'edit'])->name('perlengkapan-edit');
// Route::patch('/data-perlengkapan/{id}', [PerlengkapanController::class, 'update'])->name('perlengkapan-update');

// // routes penjualan tanaman
// Route::get('/data-penjualan/tanaman', [PenjualanTanamanController::class, 'index'])->name('crud-penjualan-tanaman');
// Route::get('/data-penjualan/tanaman/tambah', [PenjualanTanamanController::class, 'tambah'])->name('penjualan-tanaman-tambah');
// Route::post('/data-penjualan/tanaman/simpan', [PenjualanTanamanController::class, 'simpan'])->name('penjualan-tanaman-simpan');
// Route::delete('/data-penjualan/tanaman/delete/{id}', [PenjualanTanamanController::class, 'delete'])->name('penjualan-tanaman-delete');
// Route::get('/data-penjualan/tanaman/{id}/edit', [PenjualanTanamanController::class, 'edit'])->name('penjualan-tanaman-edit');
// Route::patch('/data-penjualan/tanaman/{id}', [PenjualanTanamanController::class, 'update'])->name('penjualan-tanaman-update');
// Route::get('/data-penjualan/cetak-penjualan-tanaman', [PenjualanTanamanController::class, 'cetak_pdf'])->name('cetak-tanaman');
// // Route::get('/data-penjualan/cetak_penjualan_tanaman', 'PegawaiController@cetak_pdf');

// // routes penjualan perlengkapan
// Route::get('/data-penjualan/perlengkapan', [PenjualanPerlengkapanController::class, 'index'])->name('crud-penjualan-perlengkapan');
// Route::get('/data-penjualan/perlengkapan/tambah', [PenjualanPerlengkapanController::class, 'tambah'])->name('penjualan-perlengkapan-tambah');
// Route::post('/data-penjualan/perlengkapan/simpan', [PenjualanPerlengkapanController::class, 'simpan'])->name('penjualan-perlengkapan-simpan');
// Route::delete('/data-penjualan/perlengkapan/delete/{id}', [PenjualanPerlengkapanController::class, 'delete'])->name('penjualan-perlengkapan-delete');
// Route::get('/data-penjualan/perlengkapan/{id}/edit', [PenjualanPerlengkapanController::class, 'edit'])->name('penjualan-perlengkapan-edit');
// Route::patch('/data-penjualan/perlengkapan/{id}', [PenjualanPerlengkapanController::class, 'update'])->name('penjualan-perlengkapan-update');
// Route::get('/data-penjualan/cetak-penjualan-perlengkapan', [PenjualanPerlengkapanController::class, 'cetak_pdf'])->name('cetak-perlengkapan');

// Route::get('home', function () {
//     return 'ini halaman HOME';
// });

// Route::view('welcome', 'welcome');

// Route::get('users/{id}', function ($id) {
//     return 'User ' . $id;
// });

// Route::view('index', 'index');

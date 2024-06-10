<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

Route::group(['prefix' => 'user','middleware'=>'auth'], function () {
    Route::get('/change-password', [TestingController::class, 'changePassword']);

    Route::post('/change-password', [TestingController::class, 'updatePassword']);
});



Route::group(['prefix' => 'kategori','middleware'=>'auth'],function(){
        Route::get('/',[KategoriController::class, 'index'])->name('kategori.index');
         Route::get('/kategori/tambah',[KategoriController::class, 'tambah'])->name('kategori.tambah');
         Route::post('/kategori/prosesTambah',[KategoriController::class, 'prosesTambah'])->name('kategori.prosesTambah');
         Route::get('/kategori/ubah/{id}',[KategoriController::class, 'ubah'])->name('kategori.ubah');
         Route::post('/kategori/prosesUbah',[KategoriController::class, 'prosesUbah'])->name('kategori.prosesUbah');
         Route::get('/kategori/hapus/{id}',[KategoriController::class, 'hapus'])->name('kategori.hapus');
         Route::get('/kategori/export-pdf',[KategoriController::class, 'exportPdf'])->name('kategori.exportPdf');
});

Route::group(['prefix' => 'buku','middleware'=>'auth'],function(){
    Route::get('/',[BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/tambah',[BukuController::class, 'tambah'])->name('buku.tambah');
    Route::post('/buku/prosesTambah',[BukuController::class, 'prosesTambah'])->name('buku.prosesTambah');
    Route::get('/buku/ubah/{id}',[BukuController::class, 'ubah'])->name('buku.ubah');
    Route::post('/buku/prosesUbah',[BukuController::class, 'prosesUbah'])->name('buku.prosesUbah');
    Route::get('/buku/hapus/{id}',[BukuController::class, 'hapus'])->name('buku.hapus');


});

Route::group(['prefix' => 'anggota','middleware'=>'auth'],function(){
    Route::get('/',[AnggotaController::class, 'index'])->name('anggota.index');
     Route::get('/anggota/tambah',[AnggotaController::class, 'tambah'])->name('anggota.tambah');
     Route::post('/anggota/prosesTambah',[AnggotaController::class, 'prosesTambah'])->name('anggota.prosesTambah');
     Route::get('/anggota/ubah/{id}',[AnggotaController::class, 'ubah'])->name('anggota.ubah');
     Route::post('/anggota/prosesUbah', [AnggotaController::class, 'prosesUbah'])->name('anggota.prosesUbah');
     Route::get('/anggota/hapus/{id}',[AnggotaController::class, 'hapus'])->name('anggota.hapus');
});

Route::group(['prefix' => 'peminjaman','middleware'=>'auth'],function(){
    Route::get('/',[PeminjamanController::class, 'index'])->name('peminjaman.index');
     Route::get('/peminjaman/tambah',[PeminjamanController::class, 'tambah'])->name('peminjaman.tambah');
     Route::post('/peminjaman/prosesTambah',[PeminjamanController::class, 'prosesTambah'])->name('peminjaman.prosesTambah');
     Route::get('/peminjaman/ubah/{id}',[PeminjamanController::class, 'ubah'])->name('peminjaman.ubah');
     Route::post('/peminjaman/prosesUbah', [PeminjamanController::class, 'prosesUbah'])->name('peminjaman.prosesUbah');
     Route::get('/peminjaman/hapus/{id}',[PeminjamanController::class, 'hapus'])->name('peminjaman.hapus');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');



Route::get('files/{filename}',function ($filename){
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)){
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage');



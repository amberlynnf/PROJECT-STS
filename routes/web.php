<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BucketListController;



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
})->name('welcome');


// Route::httpMethod('/path', [NamaController::class, 'namaFunc'])->name('identitas_route');
// httpMethod 
// get -> mengambil data/menampilkan halaman
// post -> mengirim data ke database (tambah data)
// patch/put -> mengubah data di database
// delete -> menghapus data
// prefix -> untuk mengelompokkan   
Route::get('/home', [BucketListController::class, 'index'])->name('home');

// mengelola bucket list
Route::prefix('/bucket-list')->name('bucket_list.')->group(function() {
    Route::get('/list', [BucketListController::class, 'index'])->name('data');
    Route::get('/tambah', [BucketListController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [BucketListController::class, 'store'])->name('TambahProses');
    Route::get('/ubah/{id}', [BucketListController::class, 'edit'])->name('ubah');
    Route::patch('/ubah/{id}/proses', [BucketListController::class, 'update'])->name('ubah.proses');
    Route::delete('/hapus/{id}', [BucketListController::class, 'destroy'])->name('hapus');

});
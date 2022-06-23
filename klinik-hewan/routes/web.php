<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriProductController;
use App\Http\Controllers\KelasProductController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PulangPaksaController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\RawatInapDetailController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\MuserController;
use App\Http\Controllers\LoginController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard.data');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::get('/', function () {
    //return view('newregister');
//});

Route::get('/', [LoginController::class, 'index'])->middleware(['guest']);

Route::resource('users', MuserController::class)->middleware(['admin']);
Route::get('/user/data', [MuserController::class, 'data'])->name('user.data');

Route::resource('dokters', DokterController::class)->middleware(['admin']);
Route::get('/dokter/data', [DokterController::class, 'data'])->name('dokter.data');

Route::resource('resepsionist', DokterController::class)->middleware(['admin']);
Route::get('/resepsionis/data', [DokterController::class, 'data'])->name('resepsionis.data');

Route::resource('pasiens', PasienController::class)->middleware(['resepsionis']);
Route::get('/pasien/data', [PasienController::class, 'data'])->name('pasien.data');

Route::resource('kategori_products', KategoriProductController::class)->middleware(['dokter']);
Route::get('/kategori_product/data', [KategoriProductController::class, 'data'])->name('kategori_product.data');

Route::resource('kelas_products', KelasProductController::class)->middleware(['dokter']);
Route::get('/kelas_product/data', [KelasProductController::class, 'data'])->name('kelas_product.data');

Route::resource('products', ProductController::class)->middleware(['dokter']);
Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');

Route::resource('rekam_medis', RekamMedisController::class)->middleware(['dokter']);

// test PDF
Route::get('/rekam_medis/pdf/{id}', [RekamMedisController::class, 'PDF'])->middleware(['dokter'])->name('pdf');

Route::get('/rekam_medice/data', [RekamMedisController::class, 'data'])->name('rekam_medice.data');

Route::resource('pulang_paksas', PulangPaksaController::class);
Route::get('/pulang_paksa/data', [PulangPaksaController::class, 'data'])->name('pulang_paksa.data');

Route::get('event', [EventController::class, 'index'])->name('event.index') ->middleware(['dokter']);
Route::post('eventAjax', [EventController::class, 'ajax']);

Route::resource('transactions', TransactionController::class)->except('create')->middleware(['dokter']);
Route::get('/transaction/{id}/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::get('/transaction/data', [TransactionController::class, 'data'])->name('transaction.data');

Route::get('/transaction_detail/{id}/data', [TransactionDetailController::class, 'data'])->name('transaction_detail.data')->middleware(['dokter']);
Route::get('/transaction_detail/loadform/{diskon}/{total}', [TransactionDetailController::class, 'loadForm'])->name('transaction_detail.load_form');
Route::resource('/transaction_detail', TransactionDetailController::class)
    ->except('create', 'show', 'edit');

Route::resource('ranaps', RawatInapController::class)->except('create')->middleware(['dokter']);
Route::get('/ranap/{id_rm}/{id_pasien}/create', [RawatInapController::class, 'create'])->name('ranap.create');
Route::get('/ranap/data', [RawatInapController::class, 'data'])->name('ranap.data');

Route::get('/ranap_detail/{id}/data', [RawatInapDetailController::class, 'data'])->name('ranap_detail.data')->middleware(['dokter']);
Route::get('/ranap_detail/loadform/{diskon}/{total}', [RawatInapDetailController::class, 'loadForm'])->name('ranap_detail.load_form');
Route::resource('/ranap_detail', RawatInapDetailController::class)
    ->except('create', 'show', 'edit');







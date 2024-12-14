<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Gudang\GudangController;
use App\Http\Controllers\Kategori\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Pdf\MakePdfController;
use App\Http\Controllers\Pemasok\PemasokController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\mimin;
use Illuminate\Container\Attributes\Auth as AttributesAuth;


// Route::group(['middleware' => 'guest'], function () {
//     Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('login', [LoginController::class, 'login']);
//     Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('register', [RegisterController::class, 'register']);
// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::post('logout', [LoginController::class, 'logout'])->name('logout');
//     // Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

Auth::routes();

Route::get('/landing', LandingController::class)->name('landing');


Route::get('/', DashboardController::class)->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardController::class)->name('index');
});

Route::middleware(['auth', mimin::class])->group(function () {

    Route::prefix('barang')->name('invent.')->group(function () {
        Route::get('/', BarangController::class)->name('barang');
        Route::post('/create', [BarangController::class, 'store'])->name('create');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    });

    Route::prefix('pemasok')->name('invent.')->group(function () {
        Route::get('/', PemasokController::class)->name('pemasok');
        Route::post('/create', [PemasokController::class, 'store'])->name('make');
        Route::get('/{id}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit');
        Route::put('/{id}', [PemasokController::class, 'update'])->name('pemasok.update');
        Route::delete('/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy');
    });

    Route::prefix('kategori')->name('invent.')->group(function () {
        Route::get('/', KategoriController::class)->name('kategori');
        Route::post('/create', [KategoriController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });

    Route::prefix('gudang')->name('invent.')->group(function () {
        Route::get('/', GudangController::class)->name('gudang');
        Route::post('/create', [GudangController::class, 'store'])->name('craft');
        Route::get('/{id}/edit', [GudangController::class, 'edit'])->name('gudang.edit');
        Route::put('/{id}', [GudangController::class, 'update'])->name('gudang.update');
        Route::delete('/{id}', [GudangController::class, 'destroy'])->name('gudang.destroy');
    });
});

Route::prefix('pdf-download')->name('pdf.')->group(function () {
    Route::get('/', [MakePdfController::class, 'index'])->name('check');
    Route::get('/view', [MakePdfController::class, 'view_pdf'])->name('view');
    Route::get('/download', [MakePdfController::class, 'download_pdf'])->name('download');
});

Route::prefix('profile')->name('user.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
});

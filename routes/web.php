<?php

use Illuminate\Support\Facades\Route;

// ADmin
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\KapalController as AdminKapalController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
// user
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\BookingController as UserBookingController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kapal', [HomeController::class, 'kapal'])->name('kapal');
Route::get('/kapal/detail/{id}', [HomeController::class, 'kapal_detail'])->name('kapal.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/trackingkapal', [HomeController::class, 'trackingkapal'])->name('trackingkapal');
Route::get('/trackingkapal/{id}', [HomeController::class, 'trackingkapal_detail'])->name('trackingkapal.detail');

// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/cekstok', [HomeController::class, 'cekstok'])->name('cekstok');



Route::group(['middleware' => ['role:admin'],'prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('kategori', AdminKategoriController::class);
    Route::resource('kapal', AdminKapalController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('booking', AdminBookingController::class);
    Route::post('editstatus/{id}', [AdminBookingController::class, 'editstatus'])->name('booking.editstatus');
    Route::get('kirimkapal/{id}', [AdminBookingController::class, 'kirimkapal'])->name('booking.kirimkapal');
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('beli/{id}', [UserBookingController::class, 'beli'])->name('user.beli');
    Route::get('sewa/{id}', [UserBookingController::class, 'sewa'])->name('user.sewa');
    Route::post('booking', [UserBookingController::class, 'booking'])->name('user.booking');
    Route::get('transaksi', [UserBookingController::class, 'transaksi'])->name('user.transaksi');
    Route::get('pembayaran/{id}', [UserBookingController::class, 'pembayaran'])->name('user.pembayaran');
    Route::post('pembayaran/{id}', [UserBookingController::class, 'bayar'])->name('user.bayar');
    Route::post('cekbiayaop', [UserBookingController::class, 'cekbop'])->name('user.cekbop');
});

Route::get('trackingall', [HomeController::class, 'tracking_all'])->name('user.tracking_all');
Route::get('tracking/{id}', [UserBookingController::class, 'tracking'])->name('user.tracking');
Route::group(['middleware' => ['role:user,admin']], function () {
    Route::get('profile', [HomeController::class, 'profile'])->name('user.profile');
    Route::post('profile', [HomeController::class, 'profile_update'])->name('user.profile');
});

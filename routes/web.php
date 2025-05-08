<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;


Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/edit', [AuthController::class, 'edit'])->name('edit');
Route::put('/auth/update', [AuthController::class, 'update'])->name('update');
Route::get('/profile', [AuthController::class, 'show'])->name('profile');


Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/loadmore', [BaseController::class, 'loadMore'])->name('loadmore');
Route::get('/{id}', [BaseController::class, 'detail'])->name('detail');

Route::post('/reservation', [BaseController::class, 'reservation'])->name('reservation');
Route::post('/midtrans/notif', [BaseController::class, 'mitdtransNotificationPopup'])->name('mitdtransNotification');
Route::post('/midtrans/update', [BaseController::class, 'updateStatusPayment'])->name('mitdtransNotification');

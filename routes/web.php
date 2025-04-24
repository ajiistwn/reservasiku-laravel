<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;


Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);


Route::get('/', [BaseController::class, 'index'])->name('index');

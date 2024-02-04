<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\LogActivity;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login/process', [LoginController::class, 'login_process'])->name('login-process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::group(['middleware' => ['auth']], function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/order/{id}/viewdetail', [OrderController::class, 'viewOrderDetail'])->name('view-order-detail');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('update-profile');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
});

Route::group(['middleware' => ['web', 'auth', 'checkAdmin']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('list-user');
    Route::get('/user/create', [UserController::class, 'create'])->name('create-user');
    Route::post('/user/store', [UserController::class, 'store'])->name('store-user');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit-user');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('update-user');
    Route::delete('/user/{id}/hapus', [UserController::class, 'destroy'])->name('hapus-user');
});

Route::group(['middleware' => ['web', 'auth', 'checkManager']], function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('list-menu');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('create-menu');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('store-menu');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('edit-menu');
    Route::put('/menu/{id}/update', [MenuController::class, 'update'])->name('update-menu');
    Route::delete('/menu/{id}/hapus', [MenuController::class, 'destroy'])->name('hapus-menu');
});

Route::group(['middleware' => ['web', 'auth', 'checkAdminOrManager']], function () {
    Route::get('/log', [LogActivityController::class, 'index'])->name('log');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::group(['middleware' => ['web', 'auth', 'checkKasir']], function () {
    Route::post('/order/create', [OrderController::class, 'create'])->name('create-order');
    Route::get('/order/{id}/detail', [OrderController::class, 'order'])->name('detail-order');
    Route::post('/order/{id}/submit', [OrderController::class, 'submitOrder'])->name('submit-order');
    Route::delete('/order/{order_id}/menu/{menu_id}', [OrderController::class, 'deleteMenu'])->name('delete-menu');
});

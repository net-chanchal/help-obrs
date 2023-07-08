<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EbookController;
use Illuminate\Support\Facades\Route;

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


Route::get('admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('admin/check', [AuthController::class, 'check'])->name('admin.check');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('ebooks', EbookController::class);
});

Route::redirect('/', 'admin/login');

<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\EbookController;
use App\Http\Controllers\User\EbookController as UserEbookController;
use App\Http\Controllers\User\RentController as UserRentController;
use Illuminate\Support\Facades\DB;
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

// Admin Panel Routes
Route::get('admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('admin/check', [AuthController::class, 'check'])->name('admin.check');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('ebooks', EbookController::class);

    Route::get('rents/index', [RentController::class, 'index'])->name('rents.index');
    Route::post('rents/status', [RentController::class, 'status'])->name('rents.status');
});


// User Panel Routes
Route::get('user/login', [UserAuthController::class, 'index'])->name('user.login');
Route::get('user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
Route::post('user/check', [UserAuthController::class, 'check'])->name('user.check');

Route::get('user/registration', [UserAuthController::class, 'create'])->name('user.create');
Route::post('user/registration', [UserAuthController::class, 'store'])->name('user.store');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function() {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('ebooks', [UserEbookController::class, 'index'])->name('ebooks.index');
    Route::post('ebooks/rent', [UserEbookController::class, 'rent'])->name('ebooks.rent');
    Route::get('ebooks/{ebook}', [UserEbookController::class, 'show'])->name('ebooks.show');

    Route::get('rents', [UserRentController::class, 'index'])->name('rents.index');
});

Route::redirect('/', 'user/login');


Route::get('/test', function() {
    echo "<pre>";
    $re = \App\Models\Ebook::with('rents')->get();

    $result = (object) $re->toArray();

    foreach ($result as $row) {
        echo $row['title']. count($row['rents']) . '<br>';
    }
});

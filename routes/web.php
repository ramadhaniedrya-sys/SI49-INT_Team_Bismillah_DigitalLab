
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {

    // Route khusus Admin harus didaftarkan lebih dahulu
    Route::middleware('role:admin')->group(function () {
        Route::resource('suppliers', SupplierController::class)
            ->except(['index', 'show']);
    });

    // Route yang bisa diakses semua user yang login
    Route::resource('suppliers', SupplierController::class)
        ->only(['index', 'show']);

});

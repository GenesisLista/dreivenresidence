<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pms\TenantController;
use App\Http\Controllers\Pms\TenantStatusController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Tenant
    Route::prefix('pms')->group(function () {
        Route::resource('tenant', TenantController::class);
    });

    // Settings
    Route::prefix('settings')->group(function () {
        Route::resource('tenant-status', TenantStatusController::class);
    });

    
});



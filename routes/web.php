<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pms\TenantController;
use App\Http\Controllers\Pms\StaMesaController;
use App\Http\Controllers\Pms\SampalocController;
use App\Http\Controllers\Pms\ApartmentController;
use App\Http\Controllers\Pms\AlrBuildingController;
use App\Http\Controllers\Pms\ActiveTenantController;
use App\Http\Controllers\Pms\TenantStatusController;
use App\Http\Controllers\Pms\RoxasDistrictController;

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

    Route::prefix('tenant')->group(function () {
        // Tenant
        Route::resource('active-tenant', ActiveTenantController::class);
    });

    Route::prefix('apartment')->group(function () {
        // Sampaloc
        Route::resource('sampaloc', SampalocController::class);

        // Sta. Mesa
        Route::resource('sta-mesa', StaMesaController::class);

        // Roxas District
        Route::resource('roxas-district', RoxasDistrictController::class);

        // ALR Building
        Route::resource('alr-building', AlrBuildingController::class);
    });

    // Settings
    Route::prefix('settings')->group(function () {
        Route::resource('tenant-status', TenantStatusController::class);
    });

    
});



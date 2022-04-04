<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pms\TenantController;
use App\Http\Controllers\Pms\StaMesaController;
use App\Http\Controllers\Pms\SampalocController;
use App\Http\Controllers\Pms\ApartmentController;
use App\Http\Controllers\Pms\AlrBuildingController;
use App\Http\Controllers\Pms\ActiveRentalController;
use App\Http\Controllers\Pms\ActiveTenantController;
use App\Http\Controllers\Pms\BillRentalAlrBuildingController;
use App\Http\Controllers\Pms\BillRentalNewController;
use App\Http\Controllers\Pms\BillRentalRoxasDistrictController;
use App\Http\Controllers\Pms\BillRentalSampalocController;
use App\Http\Controllers\Pms\BillRentalStaMesaController;
use App\Http\Controllers\Pms\NotActiveRentalController;
use App\Http\Controllers\Pms\TenantStatusController;
use App\Http\Controllers\Pms\RoxasDistrictController;
use App\Http\Controllers\Pms\NotActiveTenantController;

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

    // Rental
    Route::prefix('rental')->group(function () {
        // Active Rental
        Route::post('active-rental/room-list', [ActiveRentalController::class, 'room_list'])->name('active-rental.room-list');
        Route::resource('active-rental', ActiveRentalController::class);

        // Not Active Rental
        Route::resource('not-active-rental', NotActiveRentalController::class);
    });

    // Billing
    Route::prefix('billing')->group(function () {
        // Rental New billing
        Route::resource('rental-new', BillRentalNewController::class);

        // Rental Sampaloc Billing
        Route::resource('rental-sampaloc', BillRentalSampalocController::class);

        // Rental Sta. Mesa
        Route::resource('rental-sta-mesa', BillRentalStaMesaController::class);

        // Rental Roxas District
        Route::resource('rental-roxas-district', BillRentalRoxasDistrictController::class);

        // ALR Building
        Route::resource('rental-alr-building', BillRentalAlrBuildingController::class);
    });

    // Tenant
    Route::prefix('tenant')->group(function () {
        // Active Tenant
        Route::resource('active-tenant', ActiveTenantController::class);

        // Not Active Tenant
        Route::resource('not-active-tenant', NotActiveTenantController::class);
    });

    // Apartment
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



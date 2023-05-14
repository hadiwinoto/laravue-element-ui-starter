<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/maintenance', [App\Http\Controllers\Maintenance\MaintenanceController::class, 'indexMaintenance'])->name('maintenance');
    Route::get('/master-data', [App\Http\Controllers\MasterDataController::class, 'indexMasterData'])->name('masterdata');
    Route::get('/master-data/jenis-perbaikan', [App\Http\Controllers\MasterDataController::class,'indexPerbaikan'])->name('JenisPerbaikan');
    Route::get('/master-data/fetch-perbaikan', [App\Http\Controllers\MasterDataController::class,'getJenisPerbaikan'])->name('getJenisPerbaikan');
    Route::post('/master-data/delete-master-perbaikan/{idjenis}', [App\Http\Controllers\MasterDataController::class,'DeleteJenisPerbaikan'])->name('DeleteJenisPerbaikan');


    Route::get('/maintenance/create', [App\Http\Controllers\Maintenance\MaintenanceController::class,'showZonaSatu'])->name('showZonaSatu');
    Route::get('/maintenance/get/alldata', [App\Http\Controllers\Maintenance\MaintenanceController::class,'getData'])->name('getData');
    Route::post('/maintenance/submit', [App\Http\Controllers\Maintenance\MaintenanceController::class,'submitMaintenance'])->name('submitMaintenance');
    Route::get('/maintenance/{id}', [App\Http\Controllers\Maintenance\MaintenanceController::class,'detailMaintanance'])->name('detailMaintanance');
    Route::get('/maintenance/data/getbyid', [App\Http\Controllers\Maintenance\MaintenanceController::class,'DetailData'])->name('DetailData');
    Route::post('/maintenance/data/editdata', [App\Http\Controllers\Maintenance\MaintenanceController::class,'EditData'])->name('EditData');
    // Route::get('/master-data/tempat-perbaikan', [App\Http\Controllers\MasterDataController::class, 'indexJenisPerbaikan'])->name('JenisPerbaikan');
});






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

    //master
    Route::get('/download/template', [App\Http\Controllers\Maintenance\InputMassalController::class, 'downloadTemplate'])->name('downloadTemplate');
    Route::post('/import/template', [App\Http\Controllers\Maintenance\InputMassalController::class, 'importData'])->name('importData');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/maintenance', [App\Http\Controllers\Maintenance\MaintenanceController::class, 'indexMaintenance'])->name('maintenance');
    Route::get('/master-data', [App\Http\Controllers\MasterDataController::class, 'indexMasterData'])->name('masterdata');
    Route::get('/master-data/tempat-perbaikan', [App\Http\Controllers\MasterDataController::class, 'indexMasterTempatPerbaikan'])->name('indexMasterTempatPerbaikan');
    Route::get('/master-data/jenis-perbaikan', [App\Http\Controllers\MasterDataController::class,'indexPerbaikan'])->name('JenisPerbaikan');
    Route::get('/master-data/jenis-perbaikan/byid', [App\Http\Controllers\MasterDataController::class,'getJenisPerbaikanByid'])->name('getJenisPerbaikanByid');
    Route::get('/master-data/model-perbaikan', [App\Http\Controllers\MasterDataController::class,'indexModelPerbaikan'])->name('indexModelPerbaikan');
    Route::get('/master-data/nopol-kendaraan', [App\Http\Controllers\MasterDataController::class,'indexModelNopol'])->name('indexModelNopol');
    Route::get('/master-data/driver', [App\Http\Controllers\MasterDataController::class,'indexModelDriver'])->name('indexModelDriver');
    Route::get('/master-data/fetch-perbaikan', [App\Http\Controllers\MasterDataController::class,'getJenisPerbaikan'])->name('getJenisPerbaikan');
    Route::post('/master-data/delete-master-perbaikan/{idjenis}', [App\Http\Controllers\MasterDataController::class,'DeleteJenisPerbaikan'])->name('DeleteJenisPerbaikan');
    Route::post('/master-data/delete-master-perbaikan/data/tambah', [App\Http\Controllers\MasterDataController::class,'tambahJenisPerbaikan'])->name('tambahJenisPerbaikan');
    Route::get('/master-data/fetch-tempat-perbaikan', [App\Http\Controllers\MasterDataController::class,'getTempatPerbaikan'])->name('getTempatPerbaikan');
    Route::post('/master-data/submit-tempat-perbaikan', [App\Http\Controllers\MasterDataController::class,'tambahDataTempat'])->name('tambahDataTempat');
    Route::post('/master-data/tempat-perbaikan.delete/{id}', [App\Http\Controllers\MasterDataController::class,'deleteDAtatempat'])->name('deleteDAtatempat');
    Route::post('/master-data/edit-tempat-perbaikan', [App\Http\Controllers\MasterDataController::class,'editDataTempat'])->name('editDataTempat');
    Route::get('/master-data/fetch-tempat-perbaikan-byid', [App\Http\Controllers\MasterDataController::class,'getTempatPerbaikanByid'])->name('getTempatPerbaikanByid');
    Route::get('/master-data/fetch-nomor-kendaraan', [App\Http\Controllers\MasterDataController::class,'getDataNomorKendaraan'])->name('getDataNomorKendaraan');
    Route::get('/master-data/fetch-nomor-kendaraan-byid', [App\Http\Controllers\MasterDataController::class,'getDataNomorKendaraanByid'])->name('getDataNomorKendaraanByid');
    Route::post('/master-data/submit-nomor-kendaraan', [App\Http\Controllers\MasterDataController::class,'submitNopol'])->name('submitNopol');
    Route::post('/master-data/submit-nomor-kendaraan-delete/{id}', [App\Http\Controllers\MasterDataController::class,'deleteData'])->name('deleteData');

    Route::get('/master-data/fetch-data-driver', [App\Http\Controllers\MasterDataController::class,'getDataDriver'])->name('getDataDriver');
    Route::get('/master-data/fetch-data-driver-byid', [App\Http\Controllers\MasterDataController::class,'getDataDriverByid'])->name('getDataDriverByid');
    Route::post('/master-data/submit-data-driver', [App\Http\Controllers\MasterDataController::class,'submitDataDriver'])->name('submitDataDriver');
    Route::post('/master-data/submit-driver-delete/{id}', [App\Http\Controllers\MasterDataController::class,'deleteDataDriver'])->name('deleteDataDriver');



    //maintenance
    Route::get('/maintenance/create', [App\Http\Controllers\Maintenance\MaintenanceController::class,'showZonaSatu'])->name('showZonaSatu');
    Route::get('/maintenance/get/alldata', [App\Http\Controllers\Maintenance\MaintenanceController::class,'getData'])->name('getData');
    Route::post('/maintenance/submit', [App\Http\Controllers\Maintenance\MaintenanceController::class,'submitMaintenance'])->name('submitMaintenance');
    Route::get('/maintenance/{id}', [App\Http\Controllers\Maintenance\MaintenanceController::class,'detailMaintanance'])->name('detailMaintanance');
    Route::get('/maintenance/data/getbyid', [App\Http\Controllers\Maintenance\MaintenanceController::class,'DetailData'])->name('DetailData');
    Route::post('/maintenance/data/editdata', [App\Http\Controllers\Maintenance\MaintenanceController::class,'EditData'])->name('EditData');
    Route::get('/maintenance/download-template', [App\Http\Controllers\Maintenance\MaintenanceController::class,'downloadTemplate'])->name('downloadTemplate');
    // Route::get('/master-data/tempat-perbaikan', [App\Http\Controllers\MasterDataController::class, 'indexJenisPerbaikan'])->name('JenisPerbaikan');
});






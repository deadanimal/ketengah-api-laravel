<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AlatanController;
use App\Http\Controllers\BadmintonController;
use App\Http\Controllers\BayaranController;
use App\Http\Controllers\BilPremisController;
use App\Http\Controllers\BilRumahController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DewanController;
use App\Http\Controllers\FasilitiController;
use App\Http\Controllers\FutsalController;
use App\Http\Controllers\KategoriAduanController;
use App\Http\Controllers\LainController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\NotisController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\PremisController;
use App\Http\Controllers\SHTenderController;
use App\Http\Controllers\SHTenderDetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user', UserController::class);
Route::post('UserLogin', [UserController::class, 'UserLogin']);
Route::post('UserRegister', [UserController::class, 'UserRegister']);
Route::post('ForgotPass', [UserController::class, 'ForgotPass']);
Route::post('FirstLoginChangePassword/{id}', [UserController::class, 'FirstLoginChangePassword']);
Route::post('SearchPenggunaByName', [UserController::class, 'SearchPenggunaByName']);

Route::apiResource('aduan', AduanController::class);
Route::post('AduanFirst', [AduanController::class, 'AduanFirst']);
Route::get('AduanDD', [AduanController::class, 'AduanDD']);
Route::post('aduanStatus', [AduanController::class, 'aduanStatus']);

Route::apiResource('kategoriaduan', KategoriAduanController::class);

Route::apiResource('penghargaan', PenghargaanController::class);
Route::post('penghargaanview', [PenghargaanController::class, 'penghargaanview']);

Route::apiResource('notis', NotisController::class);
Route::post('notisview', [NotisController::class, 'notisview']);
Route::post('softdelete', [NotisController::class, 'softdelete']);
Route::post('notisapi', [NotisController::class, 'notisapi']);

Route::apiResource('admin', AdminController::class);
Route::post('searchpengguna', [AdminController::class, 'searchpengguna']);
Route::post('aktifpengguna', [AdminController::class, 'aktifpengguna']);

Route::apiResource('pengumuman', PengumumanController::class);
Route::get('pengumumantempoh', [PengumumanController::class, 'pengumumantempoh']);

Route::apiResource('dewan', DewanController::class);
Route::apiResource('lokasi', LokasiController::class);
Route::apiResource('booking', BookingController::class);
Route::get('grafbook', [BookingController::class, 'grafbook']);

Route::apiResource('lain', LainController::class);
Route::get('laindd', [LainController::class, 'laindd']);

Route::apiResource('tender', SHTenderController::class);
Route::apiResource('tenderdtl', SHTenderDetailController::class);
Route::apiResource('alatan', AlatanController::class);
Route::apiResource('badminton', BadmintonController::class);
Route::apiResource('futsal', FutsalController::class);

Route::apiResource('perumahan', PerumahanController::class);
Route::apiResource('premis', PremisController::class);

Route::apiResource('bayaran', BayaranController::class);
Route::post('lejar', [BayaranController::class, 'lejar']);

Route::apiResource('bilpremis', BilPremisController::class);
Route::apiResource('bilrumah', BilRumahController::class);
Route::apiResource('transaksi', TransaksiController::class);

Route::get('allusers', [UserController::class, 'all_users']);

Route::apiResource('fasiliti', FasilitiController::class);

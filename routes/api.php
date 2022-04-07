<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\KategoriAduanController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\NotisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
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
Route::post('UserLogin', [UserController::class,'UserLogin']);
Route::post('UserRegister', [UserController::class,'UserRegister']);
Route::post('ForgotPass', [UserController::class,'ForgotPass']);

Route::apiResource('aduan', AduanController::class);
Route::post('AduanFirst', [AduanController::class,'AduanFirst']);
Route::get('AduanDD', [AduanController::class,'AduanDD']);

Route::apiResource('kategoriaduan', KategoriAduanController::class);

Route::apiResource('penghargaan', PenghargaanController::class);
Route::post('penghargaanview', [PenghargaanController::class,'penghargaanview']);

Route::apiResource('notis', NotisController::class);
Route::post('notisview', [NotisController::class,'notisview']);
Route::post('softdelete', [NotisController::class,'softdelete']);

Route::apiResource('admin', AdminController::class);
Route::apiResource('pengumuman', PengumumanController::class);
Route::get('pengumumantempoh', [PengumumanController::class,'pengumumantempoh']);
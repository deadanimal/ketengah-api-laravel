<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\KategoriAduanController;

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

Route::apiResource('aduan', AduanController::class);
Route::post('AduanFirst', [AduanController::class,'AduanFirst']);
Route::get('AduanDD', [AduanController::class,'AduanDD']);

Route::apiResource('kategoriaduan', KategoriAduanController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblUserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('user',[TblUserController::class, 'index']);
Route::get('user/{id}',[TblUserController::class, 'show']);
Route::post('user',[TblUserController::class, 'store']);
Route::post('user/simpan',[TblUserController::class, 'simpan']);
Route::put('user/{id}',[TblUserController::class, 'update']);
Route::delete('user/{id}',[TblUserController::class, 'destroy']);

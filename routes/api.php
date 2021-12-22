<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\authapi;
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



Route::post('/login',[authapi::class,'chackname']);
Route::post('/data/add',[authapi::class,'postadd']);
Route::get('/data/get',[authapi::class,'postget']);

Route::post('/login/chackpass',[authapi::class,'chackpass']);
Route::post('/login/chackinfo',[authapi::class,'chackinfo']);
Route::post('/login/setcookie',[authapi::class,'setcookie']);
Route::get('/login/getcookie',[authapi::class,'getcookie']);
Route::post('/reg',[authapi::class,'newaccount']);
Route::post('/user',[authapi::class,'myuser']);

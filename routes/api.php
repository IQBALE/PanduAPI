<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin', 'App\Http\Controllers\AdminController@index');

Route::get('bansos', 'App\Http\Controllers\BansosController@index');
Route::get('gender', 'App\Http\Controllers\BansosController@get_gender');
Route::get('status', 'App\Http\Controllers\BansosController@get_status');
Route::get('opd', 'App\Http\Controllers\BansosController@get_opd');
Route::get('usia', 'App\Http\Controllers\BansosController@get_usia');
Route::get('usiaALL', 'App\Http\Controllers\BansosController@get_usia_ALL');
Route::get('domisili', 'App\Http\Controllers\BansosController@get_domisili');
<?php

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
Route::group(['middleware' => ['web'], 'namespace' => '\App\Http\Controllers\Crud'], function () {
    cb()->routePost('wb/login', "AdminAuthController@postLoginWB");
    cb()->routeGet('wb/login', "AdminAuthController@getLoginWB");
    cb()->routePost('pemeriksa/login', "AdminAuthController@postLoginPKBM");
    cb()->routeGet('pemeriksa/login', "AdminAuthController@getLoginPKBM");
});
Route::group(['middleware' => ['web'], 'prefix' => cb()->getAdminPath(), 'namespace' => '\App\Http\Controllers'], function () {
    cb()->routeGet('/ujian', "UjianController@index");
    cb()->routePost('/ujian', "UjianController@simpan");
    cb()->routeGet('/update', "TerakhirOnlineController@update");
    cb()->routeGet('/cek/{id}', "TerakhirOnlineController@cek");
    cb()->routeGet('/persentase', "TerakhirOnlineController@persentase");
});

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
    return view('hocsinh.create');
});
Route::get('hocsinh','App\Http\Controllers\HSController@show');
//Route::get('hocsinh/create','App\Http\Controllers\HSController@create');
Route::post('hocsinh/create','App\Http\Controllers\HSController@create');
Route::get('hocsinh/{id}/edit','App\Http\Controllers\HSController@find');
Route::post('hocsinh/update','App\Http\Controllers\HSController@update');
Route::get('hocsinh/{id}/delete','App\Http\Controllers\HocsinhController@destroy');

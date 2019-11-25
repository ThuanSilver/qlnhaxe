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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'khachhangController@search');
Route::resource('khachhang','khachhangController');
Route::post('kimport', 'khachhangController@import')->name('kimport');

Route::resource('nhanvien','nhanvienController');
Route::get('/search', 'nhanvienController@search');
Route::post('nimport', 'nhanvienController@import')->name('nimport');

Route::resource('kho','khoController');
Route::get('/search', 'khoController@search');
Route::post('khoimport', 'khoController@import')->name('khoimport');

Route::resource('thongtinxe','xeController');
Route::get('/search', 'xeController@search');
Route::get('changeStatus', 'xeController@changeStatus');
Route::post('ximport', 'xeController@import')->name('ximport');

Route::resource('quatang','quatangController');
Route::get('/search', 'quatangController@search');
Route::post('qimport', 'quatangController@import')->name('qimport');

Route::resource('tragop','tragopController');
Route::get('/search', 'tragopController@search');
Route::post('timport', 'tragopController@import')->name('timport');

Route::resource('nhapxe','nhapxeController');
Route::get('/search', 'nhapxeController@search');

Route::resource('congno','congnoController');
Route::get('/search', 'congnoController@search');

Route::resource('ktquatang','ktquatangController');
Route::get('/search', 'ktquatangController@search');

Route::resource('xuatnoibo','xuatnoiboController');
Route::get('xuatnoibo','xuatnoibocontroller@index')->name('xuatnoibo_index');
Route::get('export', 'xuatnoiboController@export')->name('export');
Route::get('hoadonnoibo', 'xuatnoiboController@xuathdnoibo')->name('banxe_xuatnoibo');


Route::resource('banxi','banxiController');
Route::get('/search', 'banxiController@search');
Route::get('changeStatus2', 'banxiController@changeStatus');
Route::get('hoadonbanxi', 'banxiController@xuathdbanxi')->name('banxe_xuatxi');

Route::resource('banxe','banxeController');
Route::get('/search', 'banxeController@search');
Route::get('changeStatus1', 'banxeController@changeStatus1');
Route::get('show/{id}', 'banxeController@show')->name('banxe_show');
Route::get('hoadonbanxe', 'banxeController@xuathdbanle')->name('banxe_xuat');

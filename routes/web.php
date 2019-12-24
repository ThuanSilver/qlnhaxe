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

Route::get('/search', 'khachhangcontroller@search');
Route::resource('khachhang','khachhangcontroller');
Route::post('kimport', 'khachhangcontroller@import')->name('kimport');

Route::resource('nhanvien','nhanviencontroller');
Route::get('/search', 'nhanviencontroller@search');
Route::post('nimport', 'nhanviencontroller@import')->name('nimport');

Route::resource('kho','khocontroller');
Route::get('/search', 'khocontroller@search');
Route::post('khoimport', 'khocontroller@import')->name('khoimport');

Route::resource('thongtinxe','xecontroller');
Route::get('/search', 'xecontroller@search');
Route::get('changeStatus', 'xecontroller@changeStatus');
Route::get('changeBaohanh', 'xecontroller@changebaohanh');
Route::post('ximport', 'xecontroller@import')->name('ximport');

Route::resource('quatang','quatangcontroller');
Route::get('/search', 'quatangcontroller@search');
Route::post('qimport', 'quatangcontroller@import')->name('qimport');

Route::resource('tragop','tragopcontroller');
Route::get('/search', 'tragopController@search');
Route::post('timport', 'tragopController@import')->name('timport');

Route::resource('nhapxe','nhapxecontroller');
Route::get('/search', 'nhapxecontroller@search');
Route::post('nhapxeimport', 'nhapxecontroller@import')->name('nhapxeimport');

Route::resource('congno','congnocontroller');
Route::get('/search', 'congnocontroller@search');

Route::resource('ktquatang','ktquatangcontroller');
Route::get('/search', 'ktquatangcontroller@search');

Route::resource('xuatnoibo','xuatnoibocontroller');
Route::get('export', 'xuatnoibocontroller@export')->name('export');
Route::get('hoadonnoibo', 'xuatnoibocontroller@xuathdnoibo')->name('banxe_xuatnoibo');


Route::resource('banxi','banxicontroller');
Route::get('/search', 'banxicontroller@search');
Route::get('changeStatus2', 'banxicontroller@changeStatus');
Route::get('hoadonbanxi', 'banxicontroller@xuathdbanxi')->name('banxe_xuatxi');


Route::resource('banxe','banxecontroller');
Route::get('changeStatus1', 'banxecontroller@changeStatus1');
Route::get('search', 'banxecontroller@search')->name('cities.search');
Route::get('searchbanxe', 'banxecontroller@searchSokhung')->name('sokhung.search');
Route::post('getbanxe', 'banxecontroller@selectAjax')->name('getbanxe');

Route::resource('banxe','banxeController');
Route::get('changeStatus1', 'banxeController@changeStatus1');
Route::get('search', 'banxeController@search')->name('cities.search');
Route::get('searchbanxe', 'banxeController@searchSokhung')->name('sokhung.search');
Route::post('getbanxe', 'banxeController@selectsokhung')->name('getbanxe');


Route::get('show/{id}', 'banxecontroller@show')->name('banxe_show');
Route::get('hoadonbanxe', 'banxecontroller@xuathdbanle')->name('banxe_xuat');

Route::resource('chi','chicontroller');

Route::resource('thungoai','thungoaicontroller');


Route::resource('banphukien','banphukiencontroller');

Route::resource('khophukien','khophukiencontroller');

Route::resource('banphukien','banphukienController');

Route::resource('khophukien','khophukienController');

Route::resource('banphukien','banphukienController');

Route::resource('khophukien','khophukienController');


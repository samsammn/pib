<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/subkomponen', function(){
    return view('komponen.subkomponen');
});

Route::get('komponen','komponenController@data');
Route::get('komponen/add','komponenController@add');
Route::post('komponen','komponenController@addProcess');
Route::get('komponen/edit/{id}','komponenController@edit');
route::patch('komponen/{id}','komponenController@editProcess');
route::delete('komponen/{id}','komponenController@delete');
Route::get('subkomponen','subkomponenController@data');
Route::get('subkomponen/add_sub','subkomponenController@add_sub');
Route::get('subkomponen/create/{komponen_id}', 'SubkomponenController@create');
Route::get('kelas','kelasController@data');
Route::get('penilaian/input/{id}', 'PenilaianController@input_nilai');
Route::get('penilaian/detail/{id}', 'PenilaianController@detail_nilai');

Route::resource('subkomponens', 'SubkomponenController');
Route::resource('penilaians', 'PenilaianController');
Route::resource('kelases', 'KelasController');
Route::resource('siswas', 'SiswaController');
route::delete('subkomponens/{id}','subkomponenController@destroy');
Route::get('subkomponen/{id}/edit','SubkomponenController@edit');
route::patch('subkomponen/{id}','subkomponenController@update');
Route::resource('tahun_ajaran', 'TahunAjaranController');

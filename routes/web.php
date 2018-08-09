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

Route::group(['prefix' => 'unggah-gambar'], function(){
    Route::get( '/', 'UnggahGambarController@index' )->name( 'unggah-gambar.index' );
    Route::post( '/', 'UnggahGambarController@store' )->name( 'unggah-gambar.store' );
});

Route::group(['prefix' => 'gambar'], function(){
    Route::get( '/', 'GambarController@index' )->name( 'gambar.index' );
    Route::get( '/table', 'GambarController@indexTable' )->name( 'gambar.indexTable' );
    Route::get( '/{gambar}', 'GambarController@show' )->name( 'gambar.show' );
    Route::get( '/{gambar}/delete', 'GambarController@destroy' )->name( 'gambar.destroy' );
});

Route::group(['prefix' => 'ekstrak'], function(){
    Route::get( '/{gambar}', 'EkstrakController@ekstrak' )->name( 'ekstrak.index' );
});

Route::group(['prefix' => 'hasil-penilaian'], function(){
    Route::get( '/', 'HasilPenilaianController@index' )->name( 'hasil-penilaian.index' );
});

Route::group(['prefix' => 'dev-konversi-input'], function(){
    Route::get( '/{gambar}/{ekstraksi}' , 'EkstrakController@convertInput');
});

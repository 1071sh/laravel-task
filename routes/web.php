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

//入力ページ
Route::get('/', 'FrontController@index')->name('index');

//確認ページ
Route::post('/confirm', 'FrontController@confirm')->name('confirm');

// //確認ページ
Route::post('/thanks', 'FrontController@thanks')->name('thanks');

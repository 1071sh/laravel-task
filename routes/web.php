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

// 入力ページ
Route::get('/', 'FrontController@index')->name('index');

// 確認ページ
Route::post('/confirm', 'FrontController@confirm')->name('confirm');

// 送信
Route::post('/thanks', 'FrontController@thanks')->name('thanks');

// 認証
Auth::routes();
Route::get('/system', 'HomeController@index');


// ログイン状態のみアクセス可能
Route::group(['middleware' => 'auth'], function () {
    // 検索画面
    Route::get('/system/answer/index', 'AnswerController@index');

    // 詳細画面
    Route::get('/system/answer/index/{id}', 'AnswerController@show');

    // 削除機能
    Route::post('/system/answer/index/{id}', 'AnswerController@delete');
});

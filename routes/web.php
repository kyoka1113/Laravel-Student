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
//メニュー画面を表示
Route::get('/home', 'HomeController@index')->name('home');
//学生表示画面を表示
Route::get('/studentview', 'StudentviewController@studentviewView')->name('studentview');
//学生登録画面を表示
Route::get('/studentregistration', 'StudentregistrationController@studentregistrationView')->name('studentregistration');
//crud処理 学生登録画面
Route::resource('students', 'StudentregistrationController');
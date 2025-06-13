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
use Illuminate\Support\Facades\Route;
use App\Http\Controller\StudentRegistrationController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//メニュー画面を表示
Route::get('/home', 'HomeController@index')->name('home');
//学生表示画面を表示
Route::get('/studentview', 'StudentviewController@studentviewView')->name('studentview');
//学生登録画面を表示
Route::get('/studentregistration', 'StudentRegistrationController@studentregistrationView')->name('studentregistration');
Route::post('/studentregistration', 'StudentRegistrationController@store')->name('students.create');
//crud処理 学生登録画面
Route::resource('students', 'StudentRegistrationController');
Route::get('/students/create', 'StudentRegistrationController@create')->name('students.create');
Route::post('/students', 'StudentRegistrationController@store')->name('students.store');
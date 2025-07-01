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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//メニュー画面を表示
Route::get('/home', 'HomeController@index')->name('home');
//学生表示画面を表示
Route::get('/studentview', ShowStudentViewController::class)->name('studentview');
//学生検索処理
Route::get('/studentview/search', SearchStudentViewController::class)->name('students.search');
//学生登録画面を表示
Route::get('/studentregistration', ShowStudentRegistrationController::class)->name('studentregistration');
//学生詳細画面を表示（ID指定）
Route::get('/students/{id}',ShowStudentDetailController::class)->name('students.show');
//成績編集画面を表示
Route::get('/editgrades', 'EditGradesController@editgradesView')->name('editgrades');
//成績登録画面を表示
Route::get('/grades/create/{id}', ShowGradeRegistrationController::class)->name('grade.create');
//成績登録処理
Route::post('/grades/store/{id}', StoreGradeRegistrationController::class)->name('grade.store');
//学生編集画面表示
Route::get('/editstudent/edit/{id}', EditStudentController::class)->name('editstudents.edit');
//学生編集処理
Route::post('/editstudent/update/{id}', UpdateStudentController::class)->name('editstudents.update');
//学生登録画面表示
Route::get('studentregistration',ShowStudentRegistrationController::class)->name('studentregistration');
//学生登録処理
Route::post('/studentregistration', StudentRegistrationController::class)->name('students.store');

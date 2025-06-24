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
//学生検索画面を表示
Route::get('/students/search', 'StudentviewController@search')->name('students.search');
//学生登録画面を表示
Route::get('/studentregistration', 'StudentRegistrationController@studentregistrationView')->name('studentregistration');
//学生詳細画面を表示（ID指定）
Route::get('/students/{id}','StudentDetailController@show')->name('students.show');
//成績編集画面を表示
Route::get('/editgrades', 'EditGradesController@editgradesView')->name('editgrades');
//成績登録画面を表示
Route::get('/graderegistration', 'GradeRegistrationController@graderegistrationView')->name('graderegistration');
//学生編集画面を表示
Route::get('/studentedit','StudentEditController@studentEditView')->name('studentedit');
//crud処理 学生登録画面
Route::resource('students', 'StudentRegistrationController');
Route::group(['prefix'=>'studentregistration'], function () {
Route::get('/studentregistration', 'StudentRegistrationController@create')->name('student.create');
Route::post('/studentregistration', 'StudentRegistrationController@store')->name('student.store');
});
//crud処理 成績登録画面
Route::resource('school_grades', 'GradeRegistrationController');
Route::group(['prefix'=>'graderegistration'], function () {
Route::get('/graderegistration/{id}/carate', 'GradeRegistrationController@create')->name('grades.create');
Route::post('/graderegistration/{id}', 'GradeRegistrationController@store')->name('grades.store');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class ShowStudentDetailController extends Controller
{
    /**学生詳細画面表示
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $students = Student::leftAll($id); // 学生と成績のリレーションを取得

         //学生詳細画面を表示
        $student = Student::with('grades')-> findOrFail($id); // 学生IDで学生を取得
        return view('studentdetail', compact('student'));//// 詳細画面にstudentを渡す
    }
}

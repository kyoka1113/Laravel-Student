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
        $grades = Student::getStudentWithGrades($id);
        $students = $grades ->first();

        if($grades->isEmpty()) {
            abort(404, '学生が見つかりません。');
        }
    return view('studentdetail', compact('students' ,'grades'));
}
}
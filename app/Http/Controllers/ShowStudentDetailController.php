<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
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
        //学生情報取得
        $student = Student::findById($id);
        if (!$student) {
            abort(404, '学生が見つかりません。'); 
        }
        //成績情報取得
        $grades = SchoolGrade::getGradesByStudentId($id);
        return view('studentdetail',[
            'student' =>$student,
            'grades' => $grades
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class EditGradeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //成績編集画面を表示
        $grades = SchoolGrade::findById($id);
        if (!$grades) {
            abort(404, '成績が見つかりません。');
        }
        $student = Student::findById($grades->student_id);
        if (!$student) {
            abort(404, '学生が見つかりません。');
        }
        return view('editgrades', compact('student', 'grades'));
    }
}

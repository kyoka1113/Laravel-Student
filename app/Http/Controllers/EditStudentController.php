<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student; // 学生モデルのインポート
use App\SchoolGrade; // 成績モデルのインポート

class EditStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //学生編集画面表示
        Student::findById($id);
        $students = Student::findById($id);
        if (!$students) {
            abort(404, '学生が見つかりません。');
        }
        return view('studentedit', compact('students'));
    }
}

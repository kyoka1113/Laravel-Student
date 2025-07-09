<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
use App\Student; // studentsテーブルインポート

class UpdateStudentGradeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //学生学年更新処理
        Student::updateStudentGrade();
        return back()->with('success', '学生の学年が更新されました。');
    }
}

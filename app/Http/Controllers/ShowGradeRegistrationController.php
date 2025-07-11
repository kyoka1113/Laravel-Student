<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class ShowGradeRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request , $id)
    {
        //成績登録画面を表示
        $student = Student::find($id);
        if (!$student) {
            abort(404, '学生が見つかりません。');
        }
        $grades = SchoolGrade::where('student_id', $id)->get();
        return view('graderegistration', compact('student' ,'grades'));

        $redirectTo = $request ->input('redirect_to');
        if($redirectTo){
            return redirect($redirectTo)->with('success', '成績が登録されました。');
        }
        return back()->with('success', '成績が登録されました。');
    }
}
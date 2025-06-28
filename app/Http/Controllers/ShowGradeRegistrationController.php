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
        $studentGrades = Student::leftAll($id);
        if($studentGrades->isEmpty()){
            abort(404);        
        }
        return view('grade.create', compact('studentGrades'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // studentsテーブルインポート

class ShowStudentViewController extends Controller
{
    /**学生表示画面の表示
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $students = Student::getAllStudent(); // 学生全件取得処理
        return view('studentview', compact('students')); 
    }
}

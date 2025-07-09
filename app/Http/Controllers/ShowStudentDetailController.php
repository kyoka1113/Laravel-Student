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
        //学生情報を表示
        $data = Student::getStudentWithGrades($id);
        if ($data->isEmpty()) {
            abort(404, '学生が見つかりません。');
        }
        $students = $data->first();
        $grades = $data->filter(function($row){

            return $row->term !== null;
        });
        return view('studentdetail', compact('students', 'grades'));
}
}
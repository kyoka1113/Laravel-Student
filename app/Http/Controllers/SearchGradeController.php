<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // school_gradesテーブルインポート

class SearchGradeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //学生情報を取得
        $students = Student::findById($id);
        if(!$students){
            abort(404, '学生が見つかりません。');
        }
        //成績検索
        $grades = SchoolGrade::searchGrades($request, $id);
        return view('studentdetail', compact('students', 'grades'));
    }
    }

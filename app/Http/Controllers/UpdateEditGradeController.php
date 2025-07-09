<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class UpdateEditGradeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //成績編集処理
        $request ->validate([
            'grade' => 'required|integer',
            'term' => 'required|string|max:10',
            'japanese' => 'required|numeric|min:0|max:100',
            'math' => 'required|numeric|min:0|max:100',
            'science' => 'required|numeric|min:0|max:100',
            'social_studies' => 'required|numeric|min:0|max:100',
            'music' => 'required|numeric|min:0|max:100',
            'home_economics' => 'required|numeric|min:0|max:100',
            'english' => 'required|numeric|min:0|max:100',
            'art' => 'required|numeric|min:0|max:100',
            'health_and_physical_education' => 'required|numeric|min:0|max:100'
        ]);
        SchoolGrade::updateGrade($id, $request);
        
        return back()->with('success','成績を更新しました');
    }
}

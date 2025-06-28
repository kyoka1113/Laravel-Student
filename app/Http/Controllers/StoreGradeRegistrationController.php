<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class StoreGradeRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //成績登録の送信フォーム
        $request->validate([
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
        //成績登録
        DB::table('school_grades')->insert([
            'student_id' => $id,
            'grade' => $request->grade,
            'term' => $request->term,
            'japanese' => $request->japanese,
            'math' => $request->math,
            'science' => $request->science,
            'social_studies' => $request->social_studies,
            'music' => $request->music,
            'home_economics' => $request->home_economics,
            'english' => $request->english,
            'art' => $request->art,
            'health_and_physical_education' => $request->health_and_physical_education,
            'created_at' => now(),
            'updated_at' => now()
        ]);   
        return back()->with('success', '成績が登録されました。');
    }
}

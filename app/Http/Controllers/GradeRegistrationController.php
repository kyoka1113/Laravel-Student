<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Student; // モデルをインポート
use App\SchoolGrade; // モデルをインポート

class GradeRegistrationController extends Controller
{
    //成績登録画面を表示
    public function graderegistrationView()
    {
        return view('graderegistration');
    }

        public function create($id)
    {
        $student = Student::findOrFail($id); // 学生IDを取得
        return view('graderegistration', compact('student'));

    }
    public function store(Request $request,$id)
    {
        //バリデーション（最低限の例）
        $request->validate([
            'grade' => 'required|integer|min:1|max:4',
            'term' => 'required|integer|min:1|max:2',
            'japanese' => 'required|integer|min:1|max:100',
            'math' => 'required|integer|min:1|max:100',
            'science' => 'required|integer|min:1|max:100',
            'social_studies' => 'required|integer|min:1|max:100',
            'music' => 'required|integer|min:1|max:100',
            'home_economics' => 'required|integer|min:1|max:100',
            'english' => 'required|integer|min:1|max:100',
            'art' => 'required|integer|min:1|max:100',
            'health_and_physical_education' => 'required|integer|min:1|max:100',
        ]);

        //保存処理
        $schoolGrade = new SchoolGrade();
            $schoolGrade -> student_id = $id; // 学生IDはリクエストから取得
            $schoolGrade -> grade = $request->grade;
            $schoolGrade -> term = $request->term;
            $schoolGrade -> japanese = $request->japanese;
            $schoolGrade -> math = $request->math;
            $schoolGrade -> science = $request->science;
            $schoolGrade -> social_studies = $request->social_studies;
            $schoolGrade -> music = $request->music;
            $schoolGrade -> home_economics = $request->home_economics;
            $schoolGrade -> english = $request->english;
            $schoolGrade ->art = $request->art;
            $schoolGrade ->health_and_physical_education = $request->health_and_physical_education;
        $schoolGrade->save();

        return back()->with('success', '成績を保存しました。');
    }
}
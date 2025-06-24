<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // モデルをインポート
use App\SchoolGrade; // モデルをインポート

class StudentDetailController extends Controller
{
    //学生詳細画面
    public function show($id)
    {
        $student = Student::with('grades')-> findOrFail($id); // 学生IDで学生を取得
        return view('studentdetail', compact('student'));//// 詳細画面にstudentを渡す
    }
}

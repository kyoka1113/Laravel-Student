<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student; // 学生モデルをインポート

class StudentviewController extends Controller
{
    //学生表示
    public function studentviewView(){
    $students = \App\Student::all(); // すべての生徒を取得
    return view('studentview', compact('students'));
    }
    
    public function search(Request $request){
    $query = Student::query(); // 条件をつける準備

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    // 条件がなければ全件、条件があれば絞り込まれた結果が入る
    $students = $query->get();

    return view('studentview', compact('students'));
    }
}
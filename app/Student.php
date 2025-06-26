<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // 学生登録追加処理
    public static function insertStudent($data){
        return DB::table('students')->insert($data);
    }
// 学生全件取得処理
    public static function getAllStudent(){
        return DB::table('students')->get();
    }
    //学生検索機能処理
    public static function searchStudents(Request $request){
        $query = \DB::table('students');

        if(!empty($request->grade)){
            $query->where('grade', $request->grade);
        }
        if(!empty($request->name)){
            $query->where('name','like','%'.$request->name.'%');
    }
    $students = $query->get();

        return view('studentview', compact('students'));
    }
    // 学生と成績のリレーション
    public static function leftAll(){
        $query = \DB::table('students')
            ->leftJoin('school_grades', 'students.id', '=', 'school_grades.student_id')
            ->select('students.*', 'school_grades.grade as school_grade');
        return $query->get();
    }
}

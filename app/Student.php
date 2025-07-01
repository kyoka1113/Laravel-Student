<?php

namespace App;
use Illuminate\Http\Request;
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
    return $query->get();
    }
    // 学生と成績のリレーション
    public static function getStudentWithGrades($id){
        return DB::table('students')
            ->leftjoin('school_grades','students.id','=','school_grades.student_id')
            ->where('students.id',$id)
            ->select(
                'students.id as student_id',
                'students.grade as students_grade',
                'students.name',
                'students.address',
                'students.img_path',
                'students.comment',
                'school_grades.grade as school_grade',
                'school_grades.term',
                'school_grades.japanese',
                'school_grades.math',
                'school_grades.science',
                'school_grades.social_studies',
                'school_grades.music',
                'school_grades.home_economics',
                'school_grades.english',
                'school_grades.art',
                'school_grades.health_and_physical_education')
            ->get();
    }

}

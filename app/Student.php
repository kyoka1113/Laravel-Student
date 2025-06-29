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
    public static function leftAll($id){
        return \DB::table('students')
        ->leftJoin('school_grades', 'students.id', '=', 'school_grades.student_id')
        ->where('students.id', $id)
        ->select(
            'students.id as student_id', // 学生ID
            'students.name', // 学生名
            'students.address', // 住所
            'students.grade', // 学年
            'students.img_path', // 画像パス
            'students.comment', // コメント
            'school_grades.grade', // 成績
            'school_grades.term', // 学期
            'school_grades.japanese', // 国語
            'school_grades.math', // 数学
            'school_grades.science', // 理科
            'school_grades.social_studies', // 社会
            'school_grades.music', // 音楽
            'school_grades.home_economics', // 家庭科
            'school_grades.english', // 英語
            'school_grades.art', // 美術
            'school_grades.health_and_physical_education' // 保健体育
        )
        ->get();
    }


}

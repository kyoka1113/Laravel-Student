<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    // 成績登録追加処理
    public static function insertGrade($grades){
        return \DB::table('school_grades')->insert($grades);
    }
    //成績を全件取得
    public static function getAllGrades(){
        return \DB::table('school_grades')->get();
    }
    //成績表示
    public static function findById($id){
        return \DB::table('school_grades')->where('id', $id)->first();
    }
    //成績登録処理
    public static function registerGrade($id,$request){
        return \DB::table('school_grades')->insert([
            'student_id'=> $id,
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
            'updated_at' => now(),
        ]);
    }
    //成績検索処理
    public static function searchGrades(Request $request, $studentId){
        $query = \DB::table('school_grades')->where('student_id', $studentId);

        if(!empty($request->grade)){
            $query->where('grade', $request->grade);
        }
        if(!empty($request->term)){
            $query->where('term', $request->term);
        }
        return $query->get();
    }
    //特定学生の成績取得
    public static function getGradesByStudentId($id)
    {
        return DB::table('school_grades')->where('student_id', $id)->get();
    }
    //成績削除処理
    public static function deleteGrade($id){
        return \DB::table('school_grades')->where('id', $id)->delete();
    }
    //成績編集処理
    public static function updateGrade($id, $request){
        return \DB::table('school_grades')->where('id', $id)->update([
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
            'updated_at' => now(),
        ]);
    }
}
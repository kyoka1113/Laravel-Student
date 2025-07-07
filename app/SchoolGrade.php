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
}
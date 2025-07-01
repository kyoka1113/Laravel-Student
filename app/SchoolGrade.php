<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    // 成績登録追加処理
    public static function insertGrade($grades){
        return \DB::table('school_grades')->insert($grades);
    }

}
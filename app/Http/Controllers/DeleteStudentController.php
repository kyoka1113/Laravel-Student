<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
use App\Student; // studentsテーブルインポート
use App\SchoolGrade; // 成績テーブルインポート

class DeleteStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //トランザクション
        DB::beginTransaction();
        try{
            SchoolGrade::deleteGrade($id); // 成績削除
            Student::deleteStudent($id); // 学生削除
            DB::commit(); // コミット
            return redirect()->route('studentview')->with('success', '学生情報が削除されました。');
        } catch (\Exception $e) {
            DB::rollBack(); // ロールバック
            return redirect()->back()->with('error', '学生情報の削除に失敗しました。');
        }
    }
}

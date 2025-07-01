<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;

class UpdateStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        //学生編集処理
        $request ->validate([
            'grade' => 'required|integer|min:1|max:4',
            'name' => 'required|string',
            'address' => 'required|string',
            'img_path' => 'required|image|max:2048',
            'comment' =>'nullable|string',
        ]);
        $updateDate =[
            'grade' => $request->grade,
            'name' => $request->name,
            'address' => $request->address,
            'comment' => $request ->comment,
            'updated_at' =>now(),
        ];
        if($request->hasFile('img_path')){
            $path = $request->file('img_path')->store('/store');
            $updateDate ['img_path'] = $path;
        }
        DB::table('students')->where('id',$id)->update($updateDate);
        return back()->with('success','学生情報を更新しました');
    }
}

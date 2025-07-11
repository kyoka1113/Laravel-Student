<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DBファサードをインポート
use App\Student; // studentsテーブルインポート

class StudentRegistrationController extends Controller
{
    /**学生登録画面の登録処理
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $img_path = $request->file('photo')->store('images', 'public');

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'img_path' => $img_path,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Student::insertStudent($data);

        return redirect()->back()->with('success', '学生情報が登録されました。');
    }
}

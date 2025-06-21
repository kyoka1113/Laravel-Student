<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Student; // studentsテーブルのモデルをインポート

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student/studentregistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
        // バリデーション
            $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // 画像の保存
        $img_path = $request->file('photo')->store('images', 'public');
        //DBへの登録
        Student::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'img_path' => $img_path,
        ]);

            return back()->with('success', '学生が正常に登録されました。');
        } catch (\Exception $e) {
    return back()->withErrors([
        'error' => '学生の登録に失敗しました。',
        'exception' => $e->getMessage(), // 例外の詳細メッセージを追加
    ]);
        }
    }   
    public function gradeUp($id){
        try{
            $student = Student::findOrFail($id);
            $student->grade += 1; // 学年を1つ上げる
            $student->save();
            return redirect()->route('home')->with('success', '学年が更新されました。');
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors([
                'error' => '学年の更新に失敗しました。',
                'exception' => $e->getMessage(), // 例外の詳細メッセージを追加
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //学生登録画面表示
    public function studentRegistrationView()
    {
        return view('studentregistration');
    }
}

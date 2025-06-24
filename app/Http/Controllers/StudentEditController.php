<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentEditController extends Controller
{
    //学生編集画面を表示
    public function studentEditView()
    {
        return view('studentedit');     
}
}
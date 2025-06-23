<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeRegistrationController extends Controller
{
    //成績登録画面を表示
    public function graderegistrationView()
    {
        return view('graderegistration');
    }
}

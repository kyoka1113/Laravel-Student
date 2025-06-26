<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowStudentRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //学生登録画面の表示
        return view('studentregistration');
    }
}

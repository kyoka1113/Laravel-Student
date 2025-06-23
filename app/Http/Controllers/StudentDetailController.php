<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    //学生詳細画面
    public function studentdetailView(){
			return view('studentdetail');
    }
}

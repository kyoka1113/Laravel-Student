<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentviewController extends Controller
{
    //学生表示
    public function studentviewView(){
			return view('studentview');
    }
}
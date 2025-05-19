<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentviewController extends Controller
{
    public function studentviewView(){
			return view('studentview');
    }
}
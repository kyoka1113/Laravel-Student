<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditGradesController extends Controller
{
    //成績編集画面を表示
    public function editgradesView()
    {
        return view('editgrades');
    }
}

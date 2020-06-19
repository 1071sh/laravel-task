<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;                 // Answerモデルクラスをuse

class AnswerController extends Controller
{
    public function index()
    {
        // $answers = Answer::all();
        $answers = Answer::paginate(3);
        return view('system/answer/index', ['answers' => $answers]);
    }
}

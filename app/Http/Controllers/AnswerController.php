<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;                 // Answerモデルクラスをuse

class AnswerController extends Controller
{
    // 一覧ページ
    public function index()
    {
        $answers = Answer::paginate(10);    //　ページネーション
        return view('system/answer/index', ['answers' => $answers]);
    }

    // 詳細ページ
    public function show($id)
    {
        //レコードを検索
        $answers = Answer::find($id);
        return view('system/answer/show', ['answers' => $answers]);
    }

    // 削除機能
    public function delete($id)
    {
        $answers = Answer::find($id);
        $answers->delete();
        return redirect('system/answer/index')->with('flash_message', '削除しました');
    }
}

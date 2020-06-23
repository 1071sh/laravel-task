<?php

namespace App\Http\Controllers;

use App\Models\Age;                    // Ageモデルクラスをuse
use App\Models\Answer;                 // Answerモデルクラスをuse
use App\Http\Requests\ContactRequest;  // ContactRequestを使用してValidate
use Illuminate\Http\Request;

class FrontController extends Controller
{
    // 入力フォーム
    public function index()
    {
        $age = new Age();                                 // Ageモデルのインスタンス化
        $items = $age->getData();                         // データ取得
        return view(
            '/front/index',
            ['items' => $items]
        );
    }


    // 確認フォーム
    public function confirm(ContactRequest $request)
    {
        // 値の全取得
        $inputs = $request->all();
        // 入力内容確認ページのinputsに変数を渡して表示
        return view(
            '/front/confirm',
            ['inputs' => $inputs]
        );
    }


    // // 送信フォーム
    public function thanks(Request $request)
    {
        $action = $request->get('action', 'back');
        $input = $request->except('action');
        if ($action === 'submit') {
            $user = new Answer;
            $input = $request->except('action');
            unset($input['_token']);
            $user->fill($input)->save();
            return view('/front/thanks');
        } else {
            return redirect()->action('FrontController@index')->withInput($request->all);
        }
    }
}

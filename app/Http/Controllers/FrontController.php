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
        return view('/front/index', ['items' => $items]); // ビューを返す
    }


    // 確認フォーム
    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all();                              // 値の全取得
        return view(
            '/front/confirm',
            ['inputs' => $inputs]
        );   // 入力内容確認ページのinputsに変数を渡して表示
    }





    // // 送信フォーム
    public function thanks(Request $request)
    {

        // $user = new Answer;
        // $user->name = $request->name;
        // $user->gender = '2';
        // $user->age_id = '1';
        // $user->email = 'yamada@yahoo.co.jp';
        // $user->is_send_email = '1';
        // $user->feedback_text = '1';
        // $user->save();

        $action = $request->get('action', 'back');
        // 二つ目は初期値です。

        $input = $request->except('action');
        // そして、入力内容からは取り除いておきます。

        if ($action === 'submit') {
            // メール送信処理などを実装

            return view('/front/thanks');
        } else {
            // 戻る

            return redirect()->action('FrontController@index')->withInput($input);
        }
    }
}

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
        $age = new Age();                // Ageモデルのインスタンス化
        $items = $age->getData();        // データ取得
        return view(
            '/front/index',
            ['items' => $items]
        );
    }


    // 確認フォーム
    public function confirm(ContactRequest $request)
    {
        $inputs = array(
        'name' => $request->input('name'),
        'gender' => $request->input('gender'),
        'age_id' => $request->input('age_id'),
        'email' => $request->input('email'),
        'is_send_email' => $request->input('is_send_email'),
        'feedback_text' => $request->input('feedback_text')
        );

        // 性別
        $sex = "不明";
        if ($request->input('gender') == "1") {
            $sex = "男性";
        } else {
            $sex = "女性";
        }
        // 年代
        $age = "不明";
        if ($request->input('age_id') == "1") {
            $age = "10代以下";
        } elseif ($request->input('age_id') == "2") {
            $age = "20代";
        } elseif ($request->input('age_id') == "3") {
            $age = "30代";
        } elseif ($request->input('age_id') == "4") {
            $age = "40代";
        } elseif ($request->input('age_id') == "5") {
            $age = "50代";
        } elseif ($request->input('age_id') == "6") {
            $age = "60代以上";
        }
        // メルマガ
        $send = "不明";
        if ($request->input('is_send_email') == "1") {
            $send = "送信許可";
        } else {
            $send = "送信不可";
        }

        // 入力内容確認ページのinputsに変数を渡して表示
        return view(
            '/front/confirm',
            [
                'inputs' => $inputs,
                'gender' => $sex,
                'age_id' => $age,
                'send'   => $send,
            ]
        );
    }


    // 送信フォーム
    public function thanks(Request $request)
    {
        // backを取得
        $action = $request->get('action', 'back');
        // actionを除く
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

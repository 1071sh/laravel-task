<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;                 // Answerモデルクラスをuse

class AnswerController extends Controller
{
    // 一覧
    public function index(Request $request)
    {
        // キーワードを取得
        $query = Answer::query();
        $name = $request->input('name');
        $gender = $request->input('gender');
        $age_id = $request->input('age_id');
        $is_send_email = $request->input('is_send_email');
        $keyword = $request->input('keyword');
        $from = $request->input('from');
        $until = $request->input('until');
        $date = $request->input('date');

        // キーワードが入力されていたら
        if (!empty($name)) {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
        if (!empty($gender)) {
            $query->where('gender', 'LIKE', '%'.$gender.'%');
        }
        if (!empty($age_id)) {
            $query->where('age_id', 'LIKE', '%'.$age_id.'%');
        }
        if (!empty($is_send_email)) {
            $query->where('is_send_email', 'LIKE', '%'.$is_send_email.'%');
        }
        if (!empty($keyword)) {
            $query->where('email', 'LIKE', "%{$keyword}%")
                ->orWhere('feedback_text', 'LIKE', "%{$keyword}%");
        }
        if (!empty($request['from']) && !empty($request['until'])) {
            $query->whereBetween("created_at", [$from, $until]);
        }
        
        // 検索条件(リクエストのパラメーター）が引き継ぎ
        $answers = $query->paginate(10)->appends($request->all());

        //取得したデータをviewに渡す
        return view('system/answer/index', [
            'answers' => $answers,
            'name' => $name,
            'gender' => $gender,
            'age_id' => $age_id,
            'is_send_email' => $is_send_email,
            'keyword' => $keyword,
            'date' => $date,
        ]);
    }

    // 一覧(削除)
    public function delete(Request $request)
    {
        foreach ($request->chk as $id) {
            Answer::find($id)->delete();
        }
        return back()->with('flash_message', '削除しました');
    }

    // 詳細
    public function show($id)
    {
        //レコードを検索
        $answers = Answer::find($id);
        // 直前のリクエストの完全なURL
        $url_prev = url()->previous();
        return view('system/answer/show', ['answers' => $answers,'url_prev' => $url_prev]);
    }

    // 詳細(削除)
    public function deleteDetail($id)
    {
        $answers = Answer::find($id);
        $answers->delete();
        return redirect('system/answer/index')->with('flash_message', '削除しました');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Front;   // Frontモデルクラスをuse
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // Frontモデルのインスタンス化
        $model = new Front();
        // データ取得
        $items = $model->getData();
        // ビューを返す
        return view('index', ['items' => $items]);
    }
}

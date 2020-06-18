<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;       // DBファサードをuse

class Age extends Model
{
    protected $table = 'ages';            // テーブル名のセット
    protected $guarded = array('sort');   // 主キーのセット
    public $timestamps = false;           // 自動タイムスタンプ挿入の是非

    public function getData()
    {
        $data = DB::table($this->table)->get(); // DBからデータを取得し返すgetData()メソッド
        return $data;
    }
}

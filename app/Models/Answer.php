<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';           // テーブル名指定
    protected $guarded = array('id');       // 主キーを設定したカラムがある場合、明示的に定義
    public $timestamps = true;
    protected $fillable = [
        'name', 'gender', 'age_id', 'email', 'is_send_email', 'feedback_text',
    ];
}

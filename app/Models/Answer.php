<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;          // DBファサードをuse

class Answer extends Model
{
    protected $table = 'answers';           // テーブル名指定
    protected $guarded = array('id');
}

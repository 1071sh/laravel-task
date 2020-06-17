<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Front extends Model
{
    protected $table = 'ages';
    protected $guarded = array('sort');
    public $timestamps = false;

    public function getData()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}

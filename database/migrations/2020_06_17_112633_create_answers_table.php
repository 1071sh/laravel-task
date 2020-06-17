<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');                     // id
            $table->string('fullname', 200);                 // 氏名
            $table->unsignedTinyInteger('gender');           // 性別: 男性:1 女性:2
            $table->integer('age_id');                       // agesのidが入る
            $table->string('email', 255);                    // メールアドレス
            $table->unsignedTinyInteger('is_send_email');    // メルマガ  送信許可:1  送信不可:0
            $table->text('feedback_text');                   // ご意見
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}

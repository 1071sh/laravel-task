@extends('front.layouts.app')

@section('title', '確認画面')

@section('content')
<form method="POST" action="{{action('FrontController@thanks')}}">
    @csrf
    <table class="table">
        <tr>
            <th style="width:200px">氏名</th>
            <td>{{ $inputs["name"] }}</td>
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        </tr>
        <tr>
            <th style="width:200px">性別</th>
            <td>@if($inputs["gender"] === '1')
                男性
                @elseif($inputs["gender"] === '2')
                女性
                @endif</td>
            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        </tr>
        <tr>
            <th style="width:200px">年代</th>
            <td>@if($inputs["age_id"] === '1')
                10代以下
                @elseif($inputs["age_id"] === '2')
                20代
                @elseif($inputs["age_id"] === '3')
                30代
                @elseif($inputs["age_id"] === '4')
                40代
                @elseif($inputs["age_id"] === '5')
                50代
                @elseif($inputs["age_id"] === '6')
                60代以上
                @endif</td>
            <input type="hidden" name="age_id" value="{{ $inputs['age_id'] }}">
        </tr>
        <tr>
            <th style="width:200px">メールアドレス</th>
            <td>{{ $inputs["email"] }}</td>
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        </tr>
        <tr>
            <th style="width:200px">メール送信可否</th>
            <td>@if($inputs["is_send_email"] === '1')
                送信許可
                @elseif($inputs["is_send_email"] === '0')
                送信不可
                @endif</td>
            <input type="hidden" name="is_send_email" value="{{ $inputs['is_send_email'] }}">
        </tr>
        <tr>
            <th style="width:200px">ご意見</th>
            <td>{!! nl2br(e($inputs["feedback_text"])) !!}</td>
            <input type="hidden" name="feedback_text" value="{{ $inputs['feedback_text'] }}">
        </tr>
    </table>
    <div class="row justify-content-center">
        <button type="submit" name="action" value="back" class="btn btn-primary btn-lg mr-4" style="width:200px">戻る</button>
        <button type="submit" name="action" value="submit" class="btn btn-success btn-lg" style="width:200px">登録</button>
    </div>
</form>
@endsection
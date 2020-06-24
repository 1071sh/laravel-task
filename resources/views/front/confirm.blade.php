@extends('front.layouts.common')

@section('title', '確認画面')

@section('content')
<div class="w-75 mx-auto">
    <form method="POST" action="{{action('FrontController@thanks')}}">
        @csrf
        <table class="table">
            <tr class="d-flex">
                <th class="col-2">氏名</th>
                <td class="col-10">{{ $inputs["name"] }}</td>
                <input type="hidden" name="name" value="{{ $inputs["name"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-2">性別</th>
                <td class="col-10">{{ $gender }}</td>
                <input type="hidden" name="gender" value="{{ $inputs["gender"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-2">年代</th>
                <td class="col-10">{{ $age_id }}</td>
                <input type="hidden" name="age_id" value="{{ $inputs["age_id"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-2">メールアドレス</th>
                <td class="col-10">{{ $inputs["email"] }}</td>
                <input type="hidden" name="email" value="{{ $inputs["email"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-2">メール送信可否</th>
                <td class="col-10">{{ $send }}</td>
                <input type="hidden" name="is_send_email" value="{{ $inputs["is_send_email"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-2">ご意見</th>
                <td class="col-10">{!! nl2br(e($inputs["feedback_text"])) !!}</td>
                <input type="hidden" name="feedback_text" value="{{ $inputs["feedback_text"] }}">
            </tr>
        </table>
        <div class="row justify-content-center">
            <button type="submit" name="action" value="back" class="btn btn-primary btn-lg mr-4" style="width:200px">戻る</button>
            <button type="submit" name="action" value="submit" class="btn btn-success btn-lg" style="width:200px">登録</button>
        </div>
    </form>
</div>
@endsection
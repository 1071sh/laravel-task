@extends('front.layouts.common')

@section('title', '確認画面')

@section('content')
<div class="w-md-75">
    <form method="POST" action="{{action('FrontController@thanks')}}">
        @csrf
        <table class="table">
            <tr class="d-flex">
                <th class="col-4 col-lg-3">氏名</th>
                <td class="col-8 col-lg-9">{{ $inputs["name"] }}</td>
                <input type="hidden" name="name" value="{{ $inputs["name"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-4 col-lg-3">性別</th>
                <td class="col-8 col-lg-9">{{ $gender }}</td>
                <input type="hidden" name="gender" value="{{ $inputs["gender"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-4 col-lg-3">年代</th>
                <td class="col-8 col-lg-9">{{ $age_id }}</td>
                <input type="hidden" name="age_id" value="{{ $inputs["age_id"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-4 col-lg-3">メールアドレス</th>
                <td class="col-8 col-lg-9">{{ $inputs["email"] }}</td>
                <input type="hidden" name="email" value="{{ $inputs["email"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-4 col-lg-3">メール送信可否</th>
                <td class="col-8 col-lg-9">{{ $send }}</td>
                <input type="hidden" name="is_send_email" value="{{ $inputs["is_send_email"] }}">
            </tr>
            <tr class="d-flex">
                <th class="col-4 col-lg-3">ご意見</th>
                <td class="col-8 col-lg-9">{!! nl2br(e($inputs["feedback_text"])) !!}</td>
                <input type="hidden" name="feedback_text" value="{{ $inputs["feedback_text"] }}">
            </tr>
        </table>
        <div class="row justify-content-center">
            <button type="submit" name="action" value="back" class="btn btn-primary btn-lg mr-4 btn-width">戻る</button>
            <button type="submit" name="action" value="submit" class="btn btn-success btn-lg btn-width">登録</button>
        </div>
    </form>
</div>
@endsection
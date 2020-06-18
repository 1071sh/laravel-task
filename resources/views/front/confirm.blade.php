@extends('front.layouts.app')

@section('title', '確認画面')

@section('content')
<form method="POST" action="{{action('FrontController@thanks')}}">
    @csrf
    <table class="table">
        <tr>
            <th style="width:200px">氏名</th>
            <td>{{ $inputs["name"] }}</td>
        </tr>
        <tr>
            <th style="width:200px">性別</th>
            <td>@if($inputs["gender"] === '1')
                男性
                @elseif($inputs["gender"] === '2')
                女性
                @endif</td>
        </tr>
        <tr>
            <th style="width:200px">年代</th>
            <td>@if($inputs["age"] === '1')
                10代以下
                @elseif($inputs["age"] === '2')
                20代
                @elseif($inputs["age"] === '3')
                30代
                @elseif($inputs["age"] === '4')
                40代
                @elseif($inputs["age"] === '5')
                50代
                @elseif($inputs["age"] === '6')
                60代以上
                @endif</td>
        </tr>
        <tr>
            <th style="width:200px">メールアドレス</th>
            <td>{{ $inputs["email"] }}</td>
        </tr>
        <tr>
            <th style="width:200px">メール送信可否</th>
            <td>@if($inputs["check-mail"] === '1')
                送信許可
                @elseif($inputs["check-mail"] === '0')
                送信不可
                @endif</td>
        </tr>
        <tr>
            <th style="width:200px">ご意見</th>
            <td>{!! nl2br(e($inputs["feedback"])) !!}</td>
        </tr>
    </table>
    <div class="row justify-content-center">
        <button type="submit" name="action" value="back" class="btn btn-primary btn-lg mr-4" style="width:200px">戻る</button>
        <button type="submit" name="action" value="submit" class="btn btn-success btn-lg" style="width:200px">登録</button>
    </div>
</form>
@endsection
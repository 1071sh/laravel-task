@extends('front.layouts.common')
@section('title', 'アンケート詳細')

@section('content')


<div class="w-md-75">
    <h1 class="mb-3">アンケート管理システム</h1>
    <table class="table table-borderless">
        <tr class="d-flex">
            <th class="col-4 col-lg-3">ID</th>
            <td class="col-8 col-lg-9">{{ $answers->id }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">氏名</th>
            <td class="col-8 col-lg-9">{{ $answers->name }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">性別</th>
            <td class="col-8 col-lg-9">@if($answers->gender === 1)男性@elseif($answers->gender === 2)女性@endif</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">年代</th>
            <td class="col-8 col-lg-9">
                @if($answers->age_id === 1)
                10代以下
                @elseif($answers->age_id === 2)
                20代
                @elseif($answers->age_id === 3)
                30代
                @elseif($answers->age_id === 4)
                40代
                @elseif($answers->age_id === 5)
                50代
                @elseif($answers->age_id === 6)
                60代以上
                @endif</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">メールアドレス</th>
            <td class="col-8 col-lg-9">{{ $answers->email }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">メール送信可否</th>
            <td class="col-8 col-lg-9">@if($answers->is_send_email === 1)
                送信許可
                @elseif($answers->is_send_email === 0)
                送信不可
                @endif</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">ご意見</th>
            <td class="col-8 col-lg-9">{!! nl2br(e($answers->feedback_text)) !!}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-4 col-lg-3">登録日時</th>
            <td class="col-8 col-lg-9">{{ $answers->created_at }}</td>
        </tr>
    </table>
    <div class="row justify-content-center">
        <a class="btn btn-success mr-3 btn-width" href="{{ $url_prev }}" role="button">一覧へ戻る</a>
        <form method="post" action="/system/answer/index/{{$answers->id}}">
            <input type="submit" value="削除する" class="btn btn-danger btn-width" id="btnDelete">
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
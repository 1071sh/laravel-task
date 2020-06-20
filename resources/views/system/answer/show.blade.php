@extends('front.layouts.common')
@section('title', 'アンケート詳細')

@section('content')


<div class="w-75 mx-auto">
    <h1 class="mb-3">アンケート管理システム</h1>
    <table class="table table-borderless">
        <tr class="d-flex">
            <th class="col-2">ID</th>
            <td class="col-10">{{ $answers->id }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">氏名</th>
            <td class="col-10">{{ $answers->name }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">性別</th>
            <td class="col-10">{{ $answers->gender }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">年代</th>
            <td class="col-10">{{ $answers->age_id }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">メールアドレス</th>
            <td class="col-10">{{ $answers->email }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">メール送信可否</th>
            <td class="col-10">{{ $answers->is_send_email }}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">ご意見</th>
            <td class="col-10">{!! nl2br(e($answers->feedback_text)) !!}</td>
        </tr>
        <tr class="d-flex">
            <th class="col-2">登録日時</th>
            <td class="col-10">{{ $answers->created_at }}</td>
        </tr>
    </table>
    <div class="row justify-content-center">
        <a class="btn btn-success mr-3" href="{{ url('/system/answer/index') }}" role="button" style="width:150px">一覧へ戻る</a>
        <form method="post" action="/system/answer/index/{{$answers->id}}">
            <input type="submit" value="削除する" class="btn btn-danger" style="width:150px" id="btnDelete">
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
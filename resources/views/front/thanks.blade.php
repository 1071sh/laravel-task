@extends('front.layouts.common')

@section('title', 'お問い合わせ完了')

@section('content')
<div class="w-75 mx-auto">
    <h1 class="card-title text-center mb-3">お問い合わせ完了</h1>
    <div class="card-body">
        <div class="alert alert-success text-center mb-5" role="alert">お問い合わせありがとうございます</div>
        <div class="row justify-content-center">
            <a class="btn btn-primary btn-lg mr-3" href="{{ url('/') }}">ホームへ戻る</a>
            <a class="btn btn-success btn-lg" href="{{ url('/system') }}">管理画面へ</a>
        </div>
    </div>
</div>
@endsection
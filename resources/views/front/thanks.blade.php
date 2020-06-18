@extends('front.layouts.app')

@section('title', 'お問い合わせ完了')

@section('content')
<h1 class="card-title text-center mb-3">お問い合わせ</h1>
<div class="card-body">
    <div class="alert alert-success text-center" role="alert">お問い合わせありがとうございます</div>
    <a href="{{ url('/') }}">ホーム</a>
</div>
@endsection
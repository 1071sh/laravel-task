@extends('front.layouts.common')
@section('title', '一覧画面')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>性別</th>
            <th>年代</th>
            <th colspan="2">内容</th>
        </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer)
        <tr>
            <td><span class="badge badge-pill badge-secondary">{{ $answer->id }}</span></td>
            <td>{{ $answer->name }}</td>
            <td>{{ $answer->gender }}</td>
            <td>{{ $answer->age_id }}</td>
            <td class="overflow">{{ $answer->feedback_text }}</td>
            <td class="text-center"><button type="button" class="btn btn-primary rounded-0">詳細</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row align-items-center">
    <span class="mr-3">全{{ $answers->total() }}件中</span>
    <span class="mr-4">{{$answers->firstItem()}}~{{ $answers->lastItem() }}件</span>
    {{ $answers->links() }}
</div>
@endsection
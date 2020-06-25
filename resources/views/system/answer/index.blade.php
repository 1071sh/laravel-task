@extends('front.layouts.common')
@section('title', 'アンケート一覧')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
<h1 class="mb-4">アンケート管理システム</h1>
<div class="border p-3 p-lg-5 mb-4">
    <form action="{{url('/system/answer/index')}}" method="GET">
        <div class="row justify-content-lg-between mb-3">
            <div class="input-block col-lg-7">
                <div class="form-group row">
                    <label for="name" class="col-lg-3 col-form-label">氏名</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" value="{{$name}}" class="form-control" id="name" placeholder="入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="age_id" class="col-lg-3 col-form-label">年代</label>
                    <div class="col-lg-9">
                        <select name="age_id" id="age_id" class="form-control">
                            <option value="" selected>すべて</option>
                            <option value="1" @if($age_id=='1' ) selected @endif>10代以下</option>
                            <option value="2" @if($age_id=='2' ) selected @endif>20代</option>
                            <option value="3" @if($age_id=='3' ) selected @endif>30代</option>
                            <option value="4" @if($age_id=='4' ) selected @endif>40代</option>
                            <option value="5" @if($age_id=='5' ) selected @endif>50代</option>
                            <option value="6" @if($age_id=='6' ) selected @endif>60代以上</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-3 col-form-label">登録日</label>
                    <div class="col-lg-9 row align-items-lg-center justify-content-lg-between">
                        <div class="col-lg-6">
                            <input type="text" name="from" value="{{ $date }}" class="form-control flatpickr" placeholder="開始日" data-input>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="until" value="{{$date}}" class="form-control flatpickr" placeholder="終了日" data-input>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keyword" class="col-lg-3 col-form-label">キーワード</label>
                    <div class="col-lg-9">
                        <input name="keyword" value="{{$keyword}}" type="text" class="form-control" id="keyword" placeholder="キーワードを入力">
                    </div>
                </div>
            </div> {{-- input --}}
            <div class="check-block col-4">
                <fieldset class="form-group mb-lg-5">
                    <div class="row">
                        <legend class="col-form-label col-lg-3 pt-0">性別</legend>
                        <div class="col-lg-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_all" value="" checked>
                                <label class="form-check-label" for="gender_all">すべて</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="1" @if ($gender==1) checked @endif>
                                <label class="form-check-label" for="male">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="2" @if ($gender==2) checked @endif>
                                <label class="form-check-label" for="female">女性</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-lg-6">メール送信許可</div>
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input" type="hidden" name="is_send_email" value="0">
                            <input class="form-check-input" type="checkbox" name="is_send_email" id="is_send_email" value="1" @if ($is_send_email==1) checked @endif>
                            <label class="form-check-label" for="is_send_email">許可のみ</label>
                        </div>
                    </div>
                </div>
            </div>{{-- check --}}
        </div>
        <div class="row justify-content-center">
            <a href="{{ url('system/answer/index') }}" role="button" class="btn btn-outline-primary mr-3 btn-sm-width">リセット</a>
            <input type="submit" class="btn btn-success btn-sm-width" value="検索">
        </div>
    </form>
</div>

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
<div class="flash_message alert alert-warning text-center" role="alert">
    {{ session('flash_message') }}
</div>
@endif

<form method="post" action="/system/answer/index">
    <div class="d-lg-flex justify-content-lg-between mb-4">
        {{ csrf_field() }}
        <div class="text-center mb-3 mb-lg-0"><input type="submit" value="選択したアンケートを削除" class="btn btn-danger" id="btnDelete"></div>
        <div class="pagi_wrapper">
            <span class="mr-3">全{{ $answers->total() }}件中</span>
            <span class="mr-4">{{$answers->firstItem()}}~{{ $answers->lastItem() }}件</span>
            <div class="paginate d-inline-block">{{ $answers->links() }}</div>
        </div>
    </div>
    <!-- 検索結果を表示 -->
    @if(count($answers) > 0)
    <div class="table-responsive">
        <table class="table table-hover" id="boxes">
            <thead>
                <tr class="d-flex">
                    <th class="col-2">
                        <div class="form-check"><label class="form-check-label" for="all"><input class="form-check-input" type="checkbox" name="allChecked" id="all">全選択</label>
                        </div>
                    </th>
                    <th class="col-1">ID</th>
                    <th class="col-2">氏名</th>
                    <th class="col-1">性別</th>
                    <th class="col-1">年代</th>
                    <th class="col-4">内容</th>
                    <th class="col-1">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $answer)
                <tr class="d-flex">
                    <td class="col-2">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox" name="chk[]" value="{{ $answer->id }}">選択</label>
                        </div>
                    </td>
                    <td class="col-1"><span class="badge badge-pill badge-secondary">{{ $answer->id }}</span></td>
                    <td class="col-2">{{ $answer->name }}</td>
                    <td class="col-1">@if($answer->gender === 1)男性@elseif($answer->gender === 2)女性@endif</td>
                    <td class="col-1">@if($answer->age_id === 1)10代以下
                        @elseif($answer->age_id === 2)20代
                        @elseif($answer->age_id === 3)30代
                        @elseif($answer->age_id === 4)40代
                        @elseif($answer->age_id === 5)50代
                        @elseif($answer->age_id === 6)60代以上
                        @endif</td>
                    <td class="col-4"><span class="overflow">{{ $answer->feedback_text }}</span></td>
                    <td class="col-1"><a class="btn btn-primary rounded-0" href="index/{{ $answer->id }}" role="button">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="boxes">
            <thead>
                <tr class="d-flex">
                    <th class="col-1">
                        <div class="form-check"><label class="form-check-label" for="all"><input class="form-check-input" type="checkbox" name="allChecked" id="all">全選択</label>
                        </div>
                    </th>
                    <th class="col-1">ID</th>
                    <th class="col-1">氏名</th>
                    <th class="col-1">性別</th>
                    <th class="col-1">年代</th>
                    <th class="col-6">内容</th>
                    <th class="col-1">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $answer)
                <tr class="d-flex">
                    <td class="col-1">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox" name="chk[]" value="{{ $answer->id }}">選択</label>
                        </div>
                    </td>
                    <td class="col-1"><span class="badge badge-pill badge-secondary">{{ $answer->id }}</span></td>
                    <td class="col-1">{{ $answer->name }}</td>
                    <td class="col-1">@if($answer->gender === 1)男性@elseif($answer->gender === 2)女性@endif</td>
                    <td class="col-1">@if($answer->age_id === 1)10代以下
                        @elseif($answer->age_id === 2)20代
                        @elseif($answer->age_id === 3)30代
                        @elseif($answer->age_id === 4)40代
                        @elseif($answer->age_id === 5)50代
                        @elseif($answer->age_id === 6)60代以上
                        @endif</td>
                    <td class="col-6"><span class="overflow">{{ $answer->feedback_text }}</span></td>
                    <td class="col-1"><a class="btn btn-primary rounded-0" href="index/{{ $answer->id }}" role="button">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
{{-- 検索がなかったら --}}
@else
<table class="table">
    <thead>
        <tr class="d-flex">
            <th class="col-1">
                <div class="form-check"><label class="form-check-label" for="all"><input class="form-check-input" type="checkbox" name="allChecked" id="all">全選択</label>
                </div>
            </th>
            <th class="col-1">ID</th>
            <th class="col-1">氏名</th>
            <th class="col-1">性別</th>
            <th class="col-1">年代</th>
            <th class="col-lg-6">内容</th>
            <th class="col-1">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="alert alert-warning text-center" role="alert">該当するアンケートはありません。</div>
            </td>
        </tr>
    </tbody>
</table>
@endif
@endsection
@section('scripts')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    flatpickr(('.flatpickr'), {
        locale: 'ja',
        dateFormat: "Y-m-d",
    });
</script>
@endsection
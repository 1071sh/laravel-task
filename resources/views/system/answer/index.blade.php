@extends('front.layouts.common')
@section('title', 'アンケート一覧')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
<h1 class="mb-4">アンケート管理システム</h1>
<div class="border p-5 mb-4">
    <form>
        <div class="row justify-content-between mb-3">
            <div class="input-block col-sm-7">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">氏名</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="入力してください">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label">年代</label>
                    <div class="col-sm-9">
                        <select id="inputState" class="form-control">
                            <option selected>すべて</option>
                            <option>10代</option>
                            <option>20代</option>
                            <option>30代</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">登録日</label>
                    <div class="col-sm-9 row  align-items-center justify-content-between">
                        <div class="col-sm-5">
                            <input type="text" class="flatpickr flatpickr-input form-control" name="date" value="{{ old('date') }}" placeholder="Select Date..">
                        </div>
                        <div class="col-sm-1">〜</div>
                        <div class="col-sm-5">
                            <input type="text" class="flatpickr flatpickr-input form-control" name="date" value="{{ old('date') }}" placeholder="Select Date..">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">キーワード</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="キーワードを入力">
                    </div>
                </div>
            </div> {{-- input --}}

            <div class="check-block col-sm-4">
                <fieldset class="form-group mb-5">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">性別</legend>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">すべて</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                                <label class="form-check-label" for="inlineRadio3">女性</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-sm-6">メール送信許可</div>
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                許可のみ
                            </label>
                        </div>
                    </div>
                </div>
            </div>{{-- check --}}
        </div>
        <div class="row justify-content-center">
            <button type="button" class="btn btn-outline-primary mr-3" style="width:100px" id="resetBtn">リセット</button>
            <button type="button" class="btn btn-success" style="width:100px">検索</button>
        </div>
    </form>
</div>

<button type="button" class="btn btn-danger">選択したアンケートを削除</button>
<div class="">
    <span class="mr-3">全{{ $answers->total() }}件中</span>
    <span class="mr-4">{{$answers->firstItem()}}~{{ $answers->lastItem() }}件</span>
    {{ $answers->links() }}
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th><label>
                    <input type="checkbox" name="all" onClick="AllChecked();" />全選択
                </label></th>
            <th>ID</th>
            <th>氏名</th>
            <th>性別</th>
            <th>年代</th>
            <th colspan="2">内容</th>
        </tr>
    </thead>
    <tbody>
        {{-- <div class="alert alert-warning text-center" role="alert">該当するアンケートはありません。</div> --}}
        @foreach($answers as $answer)
        <tr>
            <td>
                <div class="form-check">
                    <input name="test" class="form-check-input delete-check" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        選択
                    </label>
                </div>
            </td>
            <td><span class="badge badge-pill badge-secondary">{{ $answer->id }}</span></td>
            <td>{{ $answer->name }}</td>
            <td>{{ $answer->gender }}</td>
            <td>{{ $answer->age_id }}</td>
            <td class="overflow">{{ $answer->feedback_text }}</td>
            <td class="text-center"><a class="btn btn-primary rounded-0" href="index/{{ $answer->id }}" role="button">詳細</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('scripts')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
    flatpickr(('.flatpickr'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
</script>
@endsection
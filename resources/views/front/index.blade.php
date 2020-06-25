@extends('front.layouts.common')

@section('title', 'お問い合わせ')

@section('content')
<div class="w-75 mx-auto">
    <h1 class="text-center mb-5">システムへのご意見をお聞かせください。</h1>
    <form method="POST" action="{{ url('confirm')}}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">氏名 <span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="入力してください" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label class="col-sm-3 col-form-label">性別 <span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ old('gender','1') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">男性</label>
                </div>
                <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="2" @if(old('gender')=='2' )checked @endif>
                    <label class="form-check-label" for="female">女性</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="age_id" class="col-sm-3 col-form-label">年代 <span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <select class="form-control my-1 @error('age_id') is-invalid @enderror" name="age_id">
                    <option value="0" selected>選択してください</option>
                    @foreach($items as $item => $name)
                    <option value="{{ $name->sort }}" @if(old('age_id')==$name->sort) selected @endif>{{ $name->age }}</option>
                    @endforeach
                </select>
                @if ($errors->has('age_id'))
                <p class="text-danger">{{ $errors->first('age_id') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">メールアドレス <span class="text-danger">※</span></label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="入力してください" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 control-labe">メール送信可否</label>
            <div class="col-sm-9">
                <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
                <div class="form-check">
                    <input type="hidden" name="is_send_email" value="0">
                    {{-- <input type="checkbox" name="is_send_email" value="1" id="sendEmail" class="form-check-input"> --}}
                    @if( old("is_send_email")== '1')
                    <input type="checkbox" name="is_send_email" value="1" id="sendEmail" class="form-check-input" checked>
                    @else
                    <input type="checkbox" name="is_send_email" value="1" id="sendEmail" class="form-check-input">
                    @endif
                    <label class="form-check-label" for="sendEmail">送信を許可します</label>
                </div>
            </div>
        </div>
        <div class="form-group row align-items-center mb-5">
            <label for="textarea" class="col-sm-3 col-form-label">ご意見</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="textarea" placeholder="入力してください" rows="5" name="feedback_text">{{ old('feedback_text') }}</textarea>
                @if ($errors->has('feedback_text'))
                <p class="text-danger">{{ $errors->first('feedback_text') }}</p>
                @endif
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" style="width:200px">確認</button>
        </div>
    </form>
</div>
@endsection
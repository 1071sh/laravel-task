@extends('front.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
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
        <label for="age" class="col-sm-3 col-form-label">年代 <span class="text-danger">※</span></label>
        <div class="col-sm-9">
            <select class="form-control my-1　@error('age') is-invalid @enderror" name="age">
                <option value="0" selected>選択してください</option>
                @foreach ($items as $item)
                <option value="{{ $item->sort }}" @if(old('age')=='{{ $item->sort }}' ) selected="selected" @endif>{{ $item->age }}</option>


                @endforeach

                {{-- 
                <option value="{{ $item->sort }}" @if(old('age')=='{{ $item->sort }}' ) selected="selected" @endif>{{ $item->age }}</option>
                <option value="2" @if(old('id')=='2' ) selected @endif>2</option>
                <option value="3" @if(old('id')=='3' ) selected @endif>3</option> --}}
            </select>
            @if ($errors->has('age'))
            <p class="text-danger">{{ $errors->first('age') }}</p>
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
    <div class="form-group row align-items-center">
        <label for="check-mail" class="col-sm-3 col-form-label">メール送信可否</label>
        <div class="col-sm-9">
            <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
            <div class="form-check">
                <input type="hidden" name="check-mail" value="0">
                <input type="checkbox" name="check-mail" value="1" class="form-check-input" {{ old('check-mail') || !$errors->any() ? 'checked' : '' }} id="check-mail">
                <label class="form-check-label" for="check-mail">送信を許可します</label>
            </div>
        </div>
    </div>
    <div class="form-group row align-items-center mb-5">
        <label for="textarea" class="col-sm-3 col-form-label">ご意見</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="textarea" placeholder="入力してください" rows="5" name="feedback">{{ old('feedback') }}</textarea>
            @if ($errors->has('feedback'))
            <p class="text-danger">{{ $errors->first('feedback') }}</p>
            @endif
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg" style="width:200px">確認</button>
    </div>
</form>
@endsection
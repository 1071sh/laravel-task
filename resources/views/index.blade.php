@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-75 mx-auto">
        <h3 class="text-center mb-5">システムへのご意見をお聞かせください。</h3>
        <form>
            <div class="form-group row align-items-center">
                <label for="name" class="col-sm-3 col-form-label">氏名 <span class="text-danger">※</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" placeholder="入力してください">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label class="col-sm-3 col-form-label">性別 <span class="text-danger">※</span></label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                        <label class="form-check-label" for="male">男性</label>
                    </div>
                    <div class=" form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">女性</label>
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="" class="col-sm-3 col-form-label">年代 <span class="text-danger">※</span></label>
                <div class="col-sm-9">
                    <select class="form-control my-1" id="">
                        <option selected>選択してください</option>
                        <option value="1">10代以下</option>
                        <option value="2">20代</option>
                        <option value="3">30代</option>
                        <option value="4">40代</option>
                        <option value="5">50代</option>
                        <option value="6">60代以上</option>
                    </select>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="email" class="col-sm-3 col-form-label">メールアドレス <span class="text-danger">※</span></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" placeholder="入力してください">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="check-mail" class="col-sm-3 col-form-label">メール送信可否</label>
                <div class="col-sm-9">
                    <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="check-mail" id="defaultCheck1" checked>
                        <label class="form-check-label" for="defaultCheck1">送信を許可します</label>
                    </div>
                </div>
            </div>
            <div class="form-group row align-items-center mb-5">
                <label for="textarea" class="col-sm-3 col-form-label">ご意見</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="" placeholder="入力してください" rows="5"></textarea>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg" style="width:200px">確認</button>
            </div>
        </form>
    </div>
</div>
@endsection
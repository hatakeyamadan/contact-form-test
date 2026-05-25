@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form class="form" action="/confirm" method="post">
        @csrf

        {{-- お名前 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                </div>
            </div>
        </div>

        {{-- 性別 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="input--radio">
                    <label><input type="radio" name="gender" value="1" checked> 男性</label>
                    <label><input type="radio" name="gender" value="2"> 女性</label>
                    <label><input type="radio" name="gender" value="3"> その他</label>
                </div>
            </div>
        </div>

        {{-- メールアドレス --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
        </div>

        {{-- 電話番号 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <div class="input-tel">
                    <input type="text" name="tel1" placeholder="080">
                    <span>-</span>
                    <input type="text" name="tel2" placeholder="1234">
                    <span>-</span>
                    <input type="text" name="tel3" placeholder="5678">
                </div>
            </div>
        </div>

        {{-- 住所 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>

        {{-- 建物名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__input--text">
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>

        {{-- お問い合わせの種類 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <select name="content">
                    <option value="">選択してください</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
            </div>
        </div>

        {{-- お問い合わせ内容 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--textarea">
                <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
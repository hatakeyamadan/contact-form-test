@extends('layouts.app')

@section('content')

        <h2>Contact</h2>
        <form action="/contact/confirm" method="post">
            @csrf
            <table class="form-table">
                <tr>
                    <th class="form-label">お名前<span class="required">※</span></th>
                    <td>
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                    </td>
                </tr>
                <tr>
                    <th class="form-label">性別<span class="required">※</span></th>
                    <td>
                        <input type="radio" name="gender" value="1" checked> 男性
                        <input type="radio" name="gender" value="2"> 女性
                        <input type="radio" name="gender" value="3"> その他
                    </td>
                </tr>
                <tr>
                    <th class="form-label">メールアドレス<span class="required">※</span></th>
                    <td>
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    </td>
                </tr>
                <tr>
                    <th class="form-label">電話番号<span class="required">※</span></th>
                    <td>
                        <input type="text" name="tel1" size="5"> - 
                        <input type="text" name="tel2" size="5"> - 
                        <input type="text" name="tel3" size="5">
                    </td>
                </tr>
                <tr>
                    <th class="form-label">住所<span class="required">※</span></th>
                    <td>
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    </td>
                </tr>
                <tr>
                    <th class="form-label">建物名</th>
                    <td>
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </td>
                </tr>
                <tr>
                    <th class="form-label">お問い合わせの種類<span class="required">※</span></th>
                    <td>
                        <select name="category_id">
                            <option value="">選択してください</option>
                            <option value="1">商品のお届けについて</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="form-label">お問い合わせ内容<span class="required">※</span></th>
                    <td>
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </td>
                </tr>
            </table>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit">確認画面</button>
            </div>
        </form>
@endsection
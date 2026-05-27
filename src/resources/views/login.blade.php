<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <div class="header__button">
                <button class="button-login" type="button">register</button>
            </div>
        </div>
    </header>

    <main>
        <div class="register__content">
            <div class="register__heading">
                <h2>Login</h2>
            </div>

            <form class="form" action="/login" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <p>メールアドレス</p>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form__group-title">
                        <p>パスワード</p>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="pass" placeholder="例:coachtechno6" value="{{ old('pass') }}">
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
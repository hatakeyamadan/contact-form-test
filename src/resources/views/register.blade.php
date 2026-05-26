<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <div class="header__button">
                <button class="button-login" type="button">login</button>
            </div>
        </div>
    </header>

    <main>
        <div class="register__content">
            <div class="register__heading">
                <h2>Register</h2>
            </div>

            <form class="form" action="">
                <div class="form__group">
                    <div class="form__group-title">
                        <p>お名前</p>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="name" placeholder="例:山田　太郎" value="{{ old('name') }}">
                        </div>
                    </div>
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
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
# アプリケーション名
お問い合わせフォーム
## 環境構築
### Dockerビルド
- git clone git@github.com:hatakeyamadan/contact-form-test.git
- docker-compose up -d --build
### Laravel環境構築
- docker-compose exec php bash
- composer install
- cp .env.example .env 環境変数を適宜変更
- php artisan key:generato
- php artisan migrate
- php artisan db:seed
## 使用技術
- php 8.1
- Laravel 8.83.8
- mysql 8.0.26
- nginx 1.21.1
## ER図
![](img/.drowio.svg)
## 開発環境
Dockerコンテナを起動後、以下をコピーしてブラウザのURL欄に貼り付けてアクセスしてください。
- お問い合わせ画面 : lochalhost/
- ユーザー登録 : http://lochalhost/register
- phpMyAdmin : http://lochalhost:8080
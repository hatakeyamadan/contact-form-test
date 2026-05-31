<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <div class="header__button">
                @if (Auth::check())
                    <form action="/logout" method="post">
                        @csrf
                        <button class="logout__button">logout</button>
                    </form>
                @endif
            </div>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>

            <div class="search__content">
                <form class="search-form" action="/search" method="get">
                    <div class="search-form__item">
                        <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
                        <select class="search-form__item-select" name="gender">
                            <option value="">性別</option>
                            <option value="">全て</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                            <option value="3">その他</option>
                        </select>
                        <select class="search-form__item-select" name="category_id">
                            <option value="">お問い合わせの種類</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->content }}
                            </option>
                            @endforeach
                        </select>
                        <input class="search-form__item-select" type="date" name="created_at"/>
                    </div>
                    <div class="search-form__button">
                        <button class="search-form__button-submit" type="submit">検索</button>
                        <a href="/admin" class="search-form__button-reset">リセット</a>
                    </div>
                </form>
                <div class="search__export">
                    <a href="{{ url('/export?' . http_build_query(request()->query())) }}" class="button-export">エクスポート</a>
                    {{ $contacts->links() }}
                </div>
                <div class="contacts__table">
                    <table>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th></th>
                        </tr>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{$contact->first_name}}　{{$contact->last_name}}</td>
                            <td>
                                @if($contact->gender == 1) 男性
                                @elseif($contact->gender == 2) 女性
                                @else その他
                                @endif
                            </td>
                            <td>{{$contact->email}}</td>
                            <td>{{ $contact->category->content }}</td>
                            <td>
                                <button class="detail-btn" 
                                    data-id="{{ $contact->id }}"
                                    data-name="{{ $contact->first_name }}　{{ $contact->last_name }}"
                                    data-gender="@if($contact->gender == 1)男性@elseif($contact->gender == 2)女性@elseその他@endif"
                                    data-email="{{ $contact->email }}"
                                    data-tel="{{ $contact->tel }}"
                                    data-address="{{ $contact->address }}"
                                    data-building="{{ $contact->building_name ?? 'ー' }}"
                                    data-category="{{ $contact->category->content }}"
                                    data-detail="{{ $contact->detail }}">
                                    詳細
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            
            <table class="modal-table">
                <tr>
                    <th>お名前</th>
                    <td id="modal-name"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td id="modal-gender"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td id="modal-email"></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td id="modal-tel"></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td id="modal-address"></td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td id="modal-building"></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td id="modal-category"></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td id="modal-detail"></td>
                </tr>
            </table>
            <div class="modal__actions">
                <form id="delete__form" action="/delete" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" id="modal-id">
                    <button type="submit" class="modal__delete-btn">削除</button>
                </form>
            </div>
        </div>       
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('detailModal');
        const closeBtn = document.querySelector('.modal-close');
        const detailButtons = document.querySelectorAll('.detail-btn');

        // 「詳細」ボタンがクリックされた時の処理
        detailButtons.forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modal-id').value = this.dataset.id;
                document.getElementById('modal-name').textContent = this.dataset.name;
                document.getElementById('modal-gender').textContent = this.dataset.gender;
                document.getElementById('modal-email').textContent = this.dataset.email;
                document.getElementById('modal-tel').textContent = this.dataset.tel;
                document.getElementById('modal-address').textContent = this.dataset.address;
                document.getElementById('modal-building').textContent = this.dataset.building;
                document.getElementById('modal-category').textContent = this.dataset.category;
                document.getElementById('modal-detail').textContent = this.dataset.detail;

                // モーダルを表示
                modal.style.display = 'block';
            });
        });

        // 「×」ボタンがクリックされた時にモーダルを閉じる
        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });
    });
    </script>
</body>

</html>
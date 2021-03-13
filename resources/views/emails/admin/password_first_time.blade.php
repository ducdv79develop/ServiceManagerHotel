@if ($data)
    健やかショップ運営用管理画面に登録されました<br>
    下記のURLよりログインしてください。<br>
    <br>
    URL：{{ route('admin.login') }} <br>
    パスワード：<b>{{ $data['password'] }}</b> <br>
@endif

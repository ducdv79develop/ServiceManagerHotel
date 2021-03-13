下記URLにアクセスしてパスワードを再設定してください。<br>
{{ route('user.password.reset',['code'=>$data['token']]) }}

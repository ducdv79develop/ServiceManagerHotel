下記URLにアクセスしてパスワードを再設定してください。<br>
{{ route('admin.password.reset',['code'=>$data['token']]) }}

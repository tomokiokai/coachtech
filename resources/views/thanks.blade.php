@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/thanks.css">
<div class="thanks">
  <p class="text">会員登録ありがとうございます<br>
  ご登録頂いたメールアドレスに認証メールをお送りしました。<br>
  メールから認証取得後にログインお願いします。
</p>
  <a  class="login" href="login">ログインする</a>
</div>

@endsection
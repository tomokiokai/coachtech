@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="../css/login.css">
<link href="css/all.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/1139700f97.js" crossorigin="anonymous"></script>

<div class="login">
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <h1 class="login__ttl">Admin_Login</h2>
        <div class="login-email">
            @error('email')
              <p class="error"> {{ $message }} </p>
            @enderror
            <i class="fa-solid fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email">
        </div>
        <div class="login-password">
            @error('password')
              <p class="error"> {{ $message }} </p>
            @enderror
            
            <i class="fa-solid fa-clipboard-question"></i>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="form__btn">
            
            <button class="button">ログイン</button>
        </div>
    </form>
</div>

@endsection
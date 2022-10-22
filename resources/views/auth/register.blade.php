@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/register.css">
<script src="https://kit.fontawesome.com/1139700f97.js" crossorigin="anonymous"></script>

<div class="register">
    <form action="/register" method="post">
        @csrf
        <h1 class="register__ttl">Registration</h1>
        <div class="register-name">
            @error('name')
              <p class="error"> {{ $message }} </p>
            @enderror
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" id="name" placeholder="Username">
        </div>
        <div class="register-email">
            @error('email')
              <p class="error"> {{ $message }} </p>
            @enderror
            <i class="fa-solid fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email">
        </div>
        <div class="register-password">
            @error('password')
              <p class="error"> {{ $message }} </p>
            @enderror
            <i class="fa-solid fa-clipboard-question"></i>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="form__btn">
            <button class="button">登録</button>
        </div>
    </form>
</div>
@endsection
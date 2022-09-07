<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    
    <title>Contact Form</title>
</head>

<body>
<header>
<nav class="nav" id="nav">
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Registration</a></li>
    <li><a href="#">Login</a></li>
    <form method="post" action="/logout">
      @csrf  
        <input class="btn btn-logout" type="submit" value="ログアウト">
    </form>
  </ul>
</nav>
<div class="menu" id="menu">
  <span class="menu__line--top"></span>
  <span class="menu__line--middle"></span>
  <span class="menu__line--bottom"></span>
</div>
<script src="{{ asset('/js/main.js') }}"></script>
</header>
@yield('main')

</body>
</html>
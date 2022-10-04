<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    @if(app('env') == 'production')
    <link rel="stylesheet" href="{{ secure_asset('css/default.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    @endif

    <title>Rese</title>
</head>
<body>
  @guest
  <nav class="guest_nav" id="guest_nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registration</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
  </nav>
  @endguest
  @auth
  <nav class="auth_nav" id="auth_nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li>
        <form action="/logout" method="post">
        @csrf
          <button class="logout_btn">Logout</button>
        </form>
      </li>
      <li><a href="/mypage">Mypage</a></li>
    </ul>
  </nav>
  @endauth
  <div class="header">
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <h1 class="header__ttl">Rese</h1>
  </div>
    <main class="main">
        @yield('main')
    </main>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
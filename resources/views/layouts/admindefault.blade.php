<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/managerdefault.css') }}">
    <title>Rese</title>
</head>
<body>
  <h1 class=>店舗情報 管理画面</h1>
  
  <div class="header">
    <p class="user-name">ユーザー:{{$user->name}}</p>
    <form action="{{ route('admin.logout') }}" method="post">
        @csrf
          <button class="">Logout</button>
        </form>
   
  </div>
    <main class="main">
        @yield('main')
    </main>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
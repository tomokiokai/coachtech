@extends('layouts.managerdefault')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">

    <h1>新規作成</h1>
  <form action="create" method="post" class="form-content">
    @csrf
    <div>
      <label class="title">名前</label>
      <input type="text" name="name" />
      @error('name')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label class="title">email</label>
      <input type="email" name="email" />
      @error('email')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label class="title">password</label>
      <input type="password" name="password" />
      @error('password')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
      
    <div class="confirm">
      <button type="submit" name="action" value="post">新規作成</button><br>
    </div>
  </form>

  <h1>店舗代表者一覧</h1>
  <div class="form-table">
    <table>
      <tr class="table-title">
        <th>名前</th>
        <th>email</th>
        <th>password</th>
        <th>登録日</th>
        <th></th>
      </tr>
      @foreach ($admins as $admin)
        <form action="delete" method="POST">
          @csrf
          <tr>
            <input type="hidden" name="id" value="{{ $admin->id }}">
            
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->password }}</td>
            <td>{{ $admin->updated_at }}</td>
            <td class="delete"><button type="submit">削除</button></td>
          </tr>
        </form>
      @endforeach
@endsection
</body>
</html>
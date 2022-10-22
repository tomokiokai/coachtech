@extends('layouts.managerdefault')

@section('main')

  <form method="POST" action="comment/create">
    @csrf
    <div class="form-group">
      <label for="comment">コメントしてください<label>
        <textarea class="form-control" name="comment" id="comment" required></textarea>
    </div>

    <div class="text-right">
      <button type="submit" class="btn btn-primary">送信</button>
      </div>
  </form>
     <a class="back" href="javascript:history.back()">戻る</a>
          
@endsection
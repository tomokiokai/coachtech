@extends('layouts.managerdefault')

@section('main')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="comment/create">
              @csrf

              <div class="form-group">
                <label for="comment">コメントしてください</label>
                <textarea class="form-control" name="comment" id="comment" required></textarea>
              </div>

              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
            <a class="back" href="javascript:history.back()">戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
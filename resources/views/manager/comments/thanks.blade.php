<!DOCTYPE html>
<html lang="ja">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <p class="card-title">下記内容でユーザーにメール送信しました。</p>
            <p class="card-text">{{ $comment->body }}</p>
            <a class="back" href="javascript:history.back()">戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </html>

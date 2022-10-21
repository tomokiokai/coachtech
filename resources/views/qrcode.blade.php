<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Rese</title>
</head>
<body>
<div class="qr">
  {!! QrCode::size(300)->generate(route('proof',['reserve'=>$reserve])) !!}
</div>
<div class="back">
<a href="javascript:history.back()">戻る</a>
</div>
</body>

<style>
  .qr {
    text-align:center;
    margin-top:100px;
  }

  .back {
    text-align:center;
  }
</style>


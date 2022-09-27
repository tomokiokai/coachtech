<div class="qr">
  {!! QrCode::size(300)->generate(route('proof',['reserve'=>$reserve])) !!}
</div>

<style>
  .qr {
    text-align:center;
    margin-top:100px;
  }
</style>


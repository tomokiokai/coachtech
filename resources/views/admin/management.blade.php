@extends('layouts.admindefault')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">

    <h1>新規作成</h1>
  <form action="create" method="post" class="form-content">
    @csrf
    <div>
      <input type="hidden" name="admin_id" value="{{ $user_id }}"> 
      <label class="title">店舗名</label>
      <input type="text" name="shop_name" />
      @error('shop_name')
        <p class="error">{{ $message }}</p>
      @enderror
      </div>
      <div>
      <label class="title">お店の説明</label>
      <textarea name="comment" rows="6" cols="100"></textarea>
      @error('comment')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label class="title">店舗画像(URL)</label>
      <input type="text" name="image">
      @error('image')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label class="title">エリア</label>
      <select name="area_id">
          @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
          @endforeach
        </select>
        @error('area_id')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
     <div>
      <label class="title">ジャンル</label>
      <select name="genre_id">
          @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
          @endforeach
        </select>
        @error('genre_id')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="confirm">
      <button type="submit" name="action" value="post">新規作成</button><br>
    </div>
  </form>

  <form action="store" method="post" class="form-content" enctype="multipart/form-data">
    @csrf
    <div>
      <label class="title">店舗画像(URL)</label>
      <input type="file" name="datafile">
      @error('image')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div id="file_viewer"></div>
    <div>
      <button type="submit" name="action" value="post">アップデート</button><br>
    </div>
    </form>
    @if(app('env') == 'production')
    <script src="{{ secure_asset('js/file.js') }}"></script>
    @else
    <script src="{{ asset('js/file.js') }}"></script>
    @endif

  <h1>編集or予約状況確認</h1>
  <div id="cardlayout-wrap"><!-- カードレイアウトをラッピング -->

  
@foreach ($shops as $shop)   

    <section class="card-list">
        
            <figure class="card-figure"><img src="{{$shop->image}}"></figure>
            <h2 class="card-title">{{$shop->shop_name}}</h2>
            <p class="card-text-tax">
              #{{$shop->area->area_name}}
              #{{$shop->genre->genre_name}}
            </p>
            <div class="form">
          <form action="{{ route('admin.detail') }}" method="get">
          @csrf
          <input type="hidden" name="shop_id" value="{{ $shop->id }}">
          <button class="btn">編集or予約確認</button>
          </form>
          
        
    </section>
@endforeach 
@endsection
</body>
</html>
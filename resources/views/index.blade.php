@extends('layouts.default')

@section('main')
@if(app('env') == 'production')
    <link rel="stylesheet" href="{{ secure_asset('css/index.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @endif

  <div id="cardlayout-wrap"><!-- カードレイアウトをラッピング -->

  <div class="search">
<div class="search__inner">
<form action="/search" method="get">
      @csrf
        <select name="search_area">
          <option value="">All area</option>
          @foreach($areas as $area)
          <option value="{{ $area->id }}">{{ $area->area_name }}</option>
          @endforeach
        </select>

        <select name="search_genre">
          <option value="">All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
          @endforeach
          </select><i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" name="shop_name" placeholder="Search...">
        <button class="search_btn">検索</button>
</form>
</div>
</div>
    @if($shops->isEmpty())
      <p>検索結果、対象の店舗はございません</p>  
    @endif

@foreach ($shops as $shop)   

    <section class="card-list">
        
            <figure class="card-figure"><img src="{{$shop->image}}"></figure>
            <h2 class="card-title">{{$shop->shop_name}}</h2>
            <p class="card-text-tax">
              #{{$shop->area->area_name}}
              #{{$shop->genre->genre_name}}
            </p>
            <div class="form">
          <form action="/detail" method="get">
          @csrf
          <input type="hidden" name="shop_id" value="{{ $shop->id }}">
          <button class="btn">詳しく見る</button>
          </form>
          @auth
          @if(!$shop->is_liked_by_auth_user())
          <form action="/like" method="post">
          @csrf
            <input type="hidden" name="id" value="{{ $shop->id }}">
            <button class="like" ><img class="like_img" src="/img/heart_1.png" alt=""></button>
          </form>
          @else
          <form action="/unlike" method="post">
          @csrf
            <input type="hidden" name="id" value="{{ $shop->id }}">
            <button class="unlike"><img class="unlike_img" src="/img/heart_2.png" alt=""></button>
          </form>
          @endif
          @endauth
        
    </section>
@endforeach 
@endsection
</body>
</html>
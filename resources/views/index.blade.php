@extends('layouts.default')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

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
</form>
</div>
</div>
@foreach ($shops as $shop)   

    <section class="card-list">
        
            <figure class="card-figure"><img src="{{$shop->image}}"></figure>
            <h2 class="card-title">{{$shop->shop_name}}</h2>
            <p class="card-text-tax">
              #{{$shop->area->area_name}}
              #{{$shop->genre->genre_name}}
            </p>
            <div class="form">
          <form action="/detail" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $shop->id }}">
          <button class="btn">詳しく見る</button>
          </form>
         
        
    </section>
@endforeach 
@endsection
</body>
</html>
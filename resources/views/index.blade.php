@extends('layouts.app')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

  <div id="cardlayout-wrap"><!-- カードレイアウトをラッピング -->
@foreach ($shops as $shop)   

    <section class="card-list">
        
            <figure class="card-figure"><img src="{{$shop->image}}"></figure>
            <h2 class="card-title">{{$shop->name}}</h2>
            <p class="card-text-tax">
              #
              @foreach ($areas as $area)
              @if($area->id==$shop->area_id) {{ $area->address }} @endif
              @endforeach 
              #
              @foreach ($genres as $genre)
              @if($genre->id==$shop->genre_id) {{ $genre->name }} @endif
              @endforeach
            </p>
            <p class="card-text-tax"></p>
        
    </section>
@endforeach 
@endsection
</body>
</html>
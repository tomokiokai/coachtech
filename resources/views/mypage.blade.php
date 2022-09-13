@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/mypage.css">
<link href="css/all.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/1139700f97.js" crossorigin="anonymous"></script>
<h2 class="user-name">{{$user}}さん</h2>
<div class="mypage">
  <div class="reserves">
    <div class="reserves__inner">
      <h2 class="reserves__ttl">予約状況</h2>
      @foreach($reserves as $reserve)
      <div class="reserves__content">
        <div class="reserves-header">
          <div class="header-left">
            <i class="fa-regular fa-clock"></i>
            <h3 class="reserves-number">予約{{$reserve->id}}</h3>
          </div>
          <div class="header-right">
            <form action="reserve/delete" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$reserve->id}}">
              <button><i class="fa-regular fa-circle-xmark"></i></button>
            </form>
          </div>
        </div>
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $reserve->shop->shop_name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{ $reserve->date }}</td>
          </tr>
          <tr>
            <th>Time</th>
            <td>{{ $reserve->time }}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{ $reserve->num_customer }}人</td>
          </tr>
        </table>
        
  <div class="likes">
    <div class="likes__inner">
      <h2 class="likes__ttl">お気に入り店舗</h2>
      <div class="likes__content">
        @foreach($likes as $like)
        <div class="shop__card">
          <img class="shop__img" src="{{$like->shop->img}}" alt="">
          <div class="card__text">
            <p class="shop-name">{{$like->shop->shop}}</p>
            <div class="hashutag">
              <p>#{{$like->shop->area->area_name}}</p>
              <p>#{{$like->shop->genre->genre_name}}</p>
            </div>
            <div class="form">
              <form action="/detail" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $like->shop->id }}">
              <button class="btn">詳しく見る</button>
              </form>
              @auth
              @if(!$like->shop->is_liked_by_auth_user())
              <form action="/like" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $like->shop->id }}">
                <button class="like" ><img class="like_img" src="/img/heart_shape-1-2.jpg" alt=""></button>
              </form>
              @else
              <form action="/unlike" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $like->shop->id }}">
                <button class="unlike"><img class="unlike_img" src="/img/heart_shape-1.jpg" alt=""></button>
              </form>
              @endif
              @endauth
            </div>
          </div>
        </div> 
        @endforeach
      </div>
      
    </div>

  </div>
</div>
@endsection
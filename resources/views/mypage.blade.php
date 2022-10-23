@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/mypage.css">
<link href="css/all.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/1139700f97.js" crossorigin="anonymous"></script>
<h1 class="user-name">{{$user}}さん</h1>
<div class="mypage">
  <div class="reserves">
    <div class="reserves__inner">
      <h2 class="reserves__ttl">予約状況</h2>
      @foreach($reserves as $reserve)
      <div class="reserves__content">
        <div class="reserves-header">
          <div class="header-left">
            <i class="fa-regular fa-clock"></i>
            <h3 class="reserves-number">予約{{$loop->iteration}}</h3>
          </div>
          <div class="header-right">
            <form action="reserve/delete" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$reserve->id}}">
              <button><i class="fa-regular fa-circle-xmark"></i></button>
            </form>
          </div>
        </div>
        <form action="/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $reserve->id }}">
        <input type="hidden" name="user_id" value="{{ $reserve->user->id }}">
    <input type="hidden" name="shop_id" value="{{ $reserve->shop->id }}">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $reserve->shop->shop_name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td> <input type="date" name="date" id="date" value="{{ old('date', $reserve->date) }}"></td>
          </tr>
          <tr>
            <th>Time</th>
            <td>
              <div class="select">
        <select name="time" id="time">
        @for($time=10;$time<=22;$time++)
          <option value="{{ $time }}:00" @if($reserve->time=="$time:00") selected @endif>{{$time}}:00</option>
          <option value="{{ $time }}:30" @if($reserve->time=="$time:30") selected @endif>{{$time}}:30</option>
        @endfor 
        </select>
      </td>
          </tr>
          <tr>
            <th>Number</th>
            <td><div class="select">
        <select name="num_customer" id="number">
        @for($i=1; $i<=8; $i++)
        <option value="{{ $i }}" @if($reserve->num_customer==$i) selected @endif>{{$i}}人</option>
        @endfor
        </select>
      </div>
    </td>
          </tr>
        </table>

        <div class="edit">

              <button class="edit__btn">変更する</button>
        </form>
      </div>

      

      <div class="edit">
      <form action="/qrcode" method="get">
        @csrf
        <input type="hidden" name="id" value="{{ $reserve->id }}">
        <button class="edit__btn">予約QRコード</button>
        </div>
        </form>

        <div class="edit">
      <form action="{{ asset('pay') }}" method="POST">
    {{ csrf_field() }}
 <script
     src="https://checkout.stripe.com/checkout.js" class="stripe-button"
     data-key="{{ env('STRIPE_KEY') }}"
     data-amount="100"
     data-name="Stripe決済デモ"
     data-label="決済をする"
     data-description="これはデモ決済です"
     data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
     data-locale="auto"
     data-currency="JPY">
 </script>
</form>
      </div>
      </div>

      
      
        @endforeach
        </div>
  </div>

  <div class="likes">
    <div class="likes__inner">
      <h2 class="likes__ttl">お気に入り店舗</h2>
      <div class="likes__content">
        @foreach($favorites as $favorite)
        <div class="shop__card">
          <img class="shop__img" src="{{$favorite->shop->image}}" alt="">
          <div class="card__text">
            <p class="shop-name">{{$favorite->shop->shop_name}}</p>
            <div class="hashutag">
              <p>#{{$favorite->shop->area->area_name}}</p>
              <p>#{{$favorite->shop->genre->genre_name}}</p>
            </div>
            <div class="form">
              <form action="/detail" method="get">
              @csrf
              <input type="hidden" name="shop_id" value="{{ $favorite->shop->id }}">
              <button class="btn">詳しく見る</button>
              </form>
              @auth
              @if(!$favorite->shop->is_liked_by_auth_user())
              <form action="/like" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $favorite->shop->id }}">
                <button class="like" ><img class="like_img" src="/img/heart_1.png" alt=""></button>
              </form>
              @else
              <form action="/unlike" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $favorite->shop->id }}">
                <button class="unlike"><img class="unlike_img" src="/img/heart_2.png" alt=""></button>
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

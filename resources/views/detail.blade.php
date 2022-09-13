@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/detail.css">
<div class="detail">
  <div class="shop">
    <div class="shop__header">
      <a class="back" href="javascript:history.back()"><</a>
      <h2 class="shop__ttl">{{ $shop->shop_name }}</h2>
    </div>
    <img src="{{ $shop->image }}" alt="img">
    <div class="hashutag">
      <p>#{{ $shop->area->area_name }}</p>
      <p>#{{ $shop->genre->genre_name }}</p>
    </div>
    <p class="shop__content">
      {{ $shop->comment }}
    </p>
  </div>
  <form action="/reserve" method="post" class="reserve">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}"> 
    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
    <div class="reserve__inner">
      <h2 class="reserve__ttl">予約</h2>
      @error('date')
        <p class="error">{{ $message }}</p>
      @enderror
      <input type="date" name="date" id="date">
      <div class="select">
        @error('time')
          <p class="error">{{ $message }}</p>
        @enderror
        <select name="time" id="time">
        @for($time=10;$time<=22;$time++)
          <option value="{{ $time }}:00">{{$time}}:00</option>
          <option value="{{ $time }}:30">{{$time}}:30</option>
        @endfor 
        </select>
      </div>
      <div class="select">
        @error('number')
          <p class="error">{{ $message }}</p>
        @enderror
        <select name="num_customer" id="num_customer">
        @for($i=1; $i<=8; $i++)
        <option value="{{ $i }}">{{$i}}人</option>
        @endfor
        </select>
      </div>
      <div class="reserve-confirm">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $shop->shop_name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{ $reserve->date }}</td>
          </tr>
          <tr>
            <th>Time</th>
            <td id="outputTime">{{ $reserve->time }}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td id="outputNumber">{{ $reserve->num_customer }}人</td>
          </tr>
        </table>
      </div>
    </div>
    @auth
    <button class="btn">予約する</button>
    @endauth
    @guest
    <a href="/login" class="guest">予約する</a>
    @endguest
  </form>
</div>
@endsection
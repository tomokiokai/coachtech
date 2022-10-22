@extends('layouts.admindefault')

@section('main')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<form action="update" method="post" class="form-content">
      @csrf
      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
<div class="detail">
  <div class="shop">
    <div class="shop__header">      
      <a class="back" href="javascript:history.back()"><</a>
      <input type="text" style="width:300px; font-size: 24px;" name="shop_name" value="{{ $shop->shop_name }}">
    </div>
    
    <img src="{{ $shop->image }}" alt="img">
    <div>
      <label style="color:black">店舗画像(URL)</label>
      <input type="text" style=width:500px; name="image" value="{{ $shop->image }}">
      @error('image')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="hashutag">
      <p>#</p>
      <select style=width:100px; name="area_id">
          @foreach($areas as $area)
            <option value="{{ $area->id }}" @if($area->id==$shop->area_id) selected @endif>
              {{ $area->area_name }}</option>
          @endforeach
        </select>
        @error('area_id')
        <p class="error">{{ $message }}</p>
      @enderror

      <p>#</p>
      <select style=width:100px; name="genre_id">
          @foreach($genres as $genre)
            <option value="{{ $genre->id }}"@if($genre->id==$shop->genre_id) selected @endif>{{ $genre->genre_name }}</option>
          @endforeach
        </select>
        @error('genre_id')
        <p class="error">{{ $message }}</p>
      @enderror
      
    </div>
    
    <textarea name="comment" rows="6" cols="80">{{ $shop->comment }}</textarea>
    <div class="confirm">
      <button type="submit" style="width:150px; font-size: 24px; background: rgb(69, 93, 244); color: #fff; border-radius: 8px; border: none;" name="action" value="post">編集</button><br>
    </div>
  </div>
  </form>


  <form action="/reserve" method="post" class="reserve">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}"> 
    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
    <div class="reserve__inner">
      <h1 class="reserve__ttl">予約状況</h1>
      
      @auth
      @foreach ($reserves as $reserve) 
      <div class="reserve-confirm">
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
      </div>
      @endforeach 
      @endauth
    </div>
   
  </form>
</div>


<h2 class="review__ttl">他のレビュー</h2>
@foreach ($reviews as $review) 
      <div class="review-confirm">
        <table>
          <tr>
            <th>名前</th>
            <td>{{ $review->user->name }}</td>
          </tr>
          <tr>
            <th>評価点</th>
            <td>{{ $review->strars }}</td>
          </tr>
          <tr>
            <th>ご意見</th>
            <td>{{ $review->comment }}</td>
          </tr>
        </table>
      </div>
  @endforeach 

@endsection
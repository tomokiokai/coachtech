<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <title>Rese</title>
</head>
<body>
  
        <table>
          <tr>
            <th>name</th>
            <td>{{ $reserve->user->name }}様</td>
          </tr>
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

</body>
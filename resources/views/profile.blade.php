<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<title>Профиль</title>
</head>
<body>
    <div id="info">
        <img src="{{ Auth::user()->avatar }}" alt="avtr">
        <div>
            <h5>{{ Auth::user()->name }}</h5>
            <a href="logout">выйти</a>
        </div>
    </div>

    <div id="content">
        <div id="buy">
            <div class="half-width">
                <div id="buy-list">
                @php
                    $orders = DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')
                    ->select('orders.name', 'orders.created_at')
                    ->where('users.id', '=', Auth::user()->id)
                    ->orderBy('orders.id', 'desc')
                    ->get();
                @endphp
                    <ul>
                        @foreach ($orders as $order)
                            <div class="buy-list-item">
                                <li>{{ $order->name }}</li>
                                <p>{{ date('d.m.Y', strtotime($order->created_at)); }}</p>
                            </div>
                        @endforeach
                    </ul>
                </div>
                <button class="nav-btn" id="new-buy">Оформить новый заказ</button>
            </div>
            <div class="half-width">
                <div id="buy-info">
                    <h3>Информация о заказе:</h3>
                    <h4>Apex Legends</h4>
                    <div>
                        <h6>Статус: Оплачено</h6>
                        <h6>Дата: 26.05.2022</h6>
                    </div>
                    <h5>Стоимость: 10000р</h5>
                </div>
                <button class="nav-btn" id="return" onclick="test('а вот так')">Запросить возврат</button>
            </div>
        </div>
        <div id="review">

        </div>
    </div>
    <script src="js/profile.js"></script>
</body>
</html>
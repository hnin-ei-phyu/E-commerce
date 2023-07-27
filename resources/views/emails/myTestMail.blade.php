<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
</head>
<body>
    <h1>Girl's Pradise Online Shop</h1>
    <hr>
    <h2>Orde Details</h2>
    <hr>

    <ul class="list-group list-group-flush">
        <br>
        <li class="list-group-item">Order ID : {{$orderid}}</li>
        <li class="list-group-item">Date : {{$order_date}}</li>
        <li class="list-group-item bg-warning">------------------</li>
        <li class="list-group-item">Customer Name : {{$customer_name}}</li>
        <li class="list-group-item">Customer Email: {{$customer_email}}</li>
    </ul>
    <ul>
        <li>Shipping Fee : {{$shipping_fee}}</li>
        <li>-----------------------</li>
        <li>Total : {{$total}}</li>
        <li>-----------------------</li>
    </ul>
    <p>Thank you and Come Again!</p>
</body>
</html>
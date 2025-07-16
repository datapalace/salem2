<!DOCTYPE html>
<html>

<head>
    <title>Order Status</title>
</head>

<body>
    <h1>Hello {{ $order->user->name }}</h1>
    <p>Your order with ID #{{ $order->ref }} has been updated.</p>
    <p>Status: <strong>{{ $order->status }}</strong></p>
    <p>Thank you for shopping with us!</p>
</body>

</html>
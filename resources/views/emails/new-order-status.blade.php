<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
</head>

<body>
    <h1>Hello {{ $order->user->name }},</h1>
    <p>Thank you for placing your order with Salem Apparels!</p>
    <p>Your order has been received and is now being processed.</p>
    <p>Order ID: <strong>#{{ $order->ref }}</strong></p>
    <p>Status: <strong>{{ $order->status }}</strong></p>
    <p>We will notify you once your order is shipped.</p>
    <p>If you have any questions, feel free to reply to this email.</p>
    <br>
    <p>Thank you for shopping with us!</p>
</body>

</html>

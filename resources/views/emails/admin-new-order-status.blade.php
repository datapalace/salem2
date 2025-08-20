<!DOCTYPE html>
<html>

<head>
    <title>New Order Notification</title>
</head>

<body>
    <h1>New Order Received</h1>
    <p>A new order has been placed on Salem Apparels.</p>
    <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
    <p><strong>Order ID:</strong> #{{ $order->ref }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p>Please review and process this order in the admin dashboard.</p>
    <br>
    <p>Thank you.</p>
</body>

</html>
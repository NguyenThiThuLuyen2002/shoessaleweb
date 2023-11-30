<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Đặt hàng thành công!</h1>
    <p>Mã đơn hàng của bạn là: {{ $order->id }}</p>
    <p>Thời gian: {{ $order->created_at }}</p>
    <h3>Cảm ơn bạn đã mua hàng tại THT shop, hehe! </h3>
    <!-- Add more order details as needed -->
</body>
</html>

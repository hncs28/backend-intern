<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xacnhanmail</title>
</head>

<body>
    <form class="xacnhan">
        <table class="hi">
            <tr>
                <th>Kính gửi:</th>
                <th style="font-weight: normal;">Khách hàng</th>
                <th>{{ $order->customerName }}</th>
            </tr>
        </table>
        <p style="padding-bottom: 10px;">Phòng khám xin trân trọng cảm ơn và thông báo quý khách hàng đã đặt lịch khám thành công. Phòng khám gửi lại thông tin đặt lịch, quý khách hàng vui lòng kiểm tra lại thông sau đây:</p>
        <table class="info" style="text-align: left; margin-left: 30px;">
            <tr>
                <th>Họ tên:</th>
                <th>{{ $order->customerName }}</th>
            </tr>
            <tr>
                <th>SĐT:</th>
                <th>{{ $order->customerPhone }}</th>
            </tr>
            <tr>
                <th>Email:</th>
                <th>{{ $order->customerEmail }}</th>
            </tr>
            <tr>
                <th style="padding-right: 15px;">Lịch khám:</th>
                <th>{{ $order->bookingTime }}</th>
            </tr>
            <tr>
                <th>Bác sĩ:</th>
                <th>{{ $order->employeeName }}</th>
            </tr>
            <tr>
                <th>Dịch vụ:</th>
                <th>{{ $order->serviceName }}</th>
            </tr>
            <tr>
                <th>Giá:</th>
                <th>{{ $order->price }}</th>
            </tr>
        </table>
        <p>Bạn vui lòng xem kỹ các thông tin phía trên, nếu thông tin đầu chính xác vui lòng đến khám đúng lịch đã đăng ký, nếu thông tin phía trên có sai sót vui lòng liên hệ 0987654321 để sửa lại thông tin.</p>
        <p>Chúng tôi rất mong được phục vụ Bạn tại phòng khám Mắt Ngôi Sao</p>
        <h3>Trân trọng!</h3>
    </form>
</body>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-image: url(anh.jpg);
    }

    form{
        padding: 20px;
        border: 2px solid #f0f0f0;
        border-radius: 20px;
        background-color: #f0f0f0;
        width: 50%;
        color: black;
    }
</style>
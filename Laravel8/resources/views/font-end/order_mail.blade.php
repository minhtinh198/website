<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial;
        }
        
        .coupon {
            border: 5px solid;
            width: 80%;
            margin: auto;
            max-width: 1000px;
        }
        
        .container {
            padding: 2px 16px;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="coupon">
        <div class="container">
            <h2 style="text-align:center;">Tính Phạm</h2>
        </div>
        <div class="container">
            <h2>Thông Tin Đơn Hàng</h2>
            <p>Email :{{$mail_array['Email_Customer']}} </p>
            <p>Họ Tên : {{$mail_array['name_Customer']}} </p>
            <p>Phone : {{$mail_array['phone_Customer']}}</p>
            <p>Mã khuyến mãi: {{$coupon['coupon_code']}}</p>
        </div>
        <div class="container">
            <h2>Sản Phẩm Đã Đặt</h2>
            <table >
                <tr>
                    <th style="width: 400px;">Sản Phẩm</th>
                    <th style="width: 100px;">Số Lượng</th>
                    <th style="width: 200px;">Giá Tiền</th>
                    <th style="width: 200px;">Thành Tiền</th>
                </tr>
                    @php
                        $sub_total = 0;
                        $total = 0;
                    @endphp
                    @foreach($cart_array as $cart)
                    @php
                        $sub_total = $cart['product_qty']*$cart['product_price'];
                        $total += $sub_total;
                    @endphp
                            <tr style="text-align: center">
                                    <td style="width: 400px;">{{$cart['product_name']}}</td>
                                    <td style="width: 100px;">{{$cart['product_qty']}}</td>
                                    <td style="width: 200px;">{{number_format($cart['product_price'])}} vnđ</td>
                                    <td style="width: 200px;">{{number_format($sub_total)}} vnđ</td>
                            </tr>
                @endforeach
            </table>
                            @if ($coupon['lever'] == 2)
                                    @php
                                            $total_coupon = ($total*$coupon['coupon_number'])/100;
                                        @endphp
                                        <div style="margin-left: 600px">
                                            <h2>Khuyến Mãi : {{$coupon['coupon_number']}} %</h2>
                                        </div>
                                        <div style="margin-left: 600px">
                                            <h2>Tổng  Tiền : {{number_format($total_coupon)}} vnđ</h2>
                                        </div>
                            @elseif ($coupon['lever'] == 1)
                                        <div style="margin-left: 600px">
                                            <h2>Khuyến Mãi : {{number_format($coupon['coupon_number'])}} vnđ</h2>
                                        </div>
                                        @php
                                            $total_coupon= $total -  $coupon['coupon_number'];
                                        @endphp
                                        <div style="margin-left: 600px">
                                            <h2>Tổng  Tiền : {{number_format($total_coupon)}} vnđ</h2>
                                        </div>
                            @else
                                <div style="margin-left: 600px">
                                    <h2>Tổng  Tiền : {{number_format($total)}} vnđ</h2>
                                </div>
                            @endif
            
        </div>
    </div>
</body>
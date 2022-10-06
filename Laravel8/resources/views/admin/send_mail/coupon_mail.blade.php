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
            border: 5px dotted#bbb;
            width: 80%;
            border-radius: 15px;
            margin: auto;
            max-width: 600px;
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
            <h3 style="text-align:center;">Tính Phạm Store</h3>
        </div>
        <div class="container">
            <h2>
                @if($coupon['lever'] == 2)
                    Giảm {{$coupon['coupon_number'] }} %
                @else
                    Giảm {{number_format($coupon['coupon_number'] )}}
                @endif
                cho tổng đơn hàng
            </h2>

            <p> Qúy khách đã từng mua hàng tại shop. Nếu đã có tài khoản xin vui lòng đăng nhập vào tài khoản để mua hàng và nhập mã code bên dưới để được giảm giá mua hàng. Xin Cảm Ơn!!
            </p>
        </div>
        <div class="container">
            <p class="expire">Ngày bắt đầu : <b>{{$coupon['coupon_start']}}</b></p>
            <p class="code">Mã khuyến Mãi :<span class="promo"><b>{{$coupon['coupon_code']}}</b></span></p>
            <p class="expire">Ngày hết hạn : <b>{{$coupon['coupon_end']}}</b></p>
        </div>
    </div>
</body>

</html>
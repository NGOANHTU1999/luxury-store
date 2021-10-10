<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
        }

        .coupon {
            border: 5px dotted #ea4c89;
            width: 80%;
            border-radius: 15px;
            margin: 0 auto;
            max-width: 600px;
        }

        .container {
            padding: 2px 16px;
            background-color: #FF9900;
        }

        .promo {
            background: #ccc;
            padding: 4px;
        }

        .expire {
            color: red;
        }
    </style>
</head>
<body>

<div class="coupon">
    <div class="container">
        <center><h3 style="color:red;font-size:30px">LUXURY-STRORE DISCOUPON</h3></center>
    </div>
    <img src="https://i0.wp.com/s1.uphinh.org/2021/05/05/taonew.md.jpg" alt="Avatar" style="width:100%;">
    <div class="container" style="background-color:white">
        <h2><b>Quickly Enter Promo Code</b> <b>{{$coupon['coupon_name']}}</b></h2>
        <p>Luxury - Store sent you a discount code, thank you for accompanying and trusting us in the past time,
            Your promotion code is ready, use it now.</p>
    </div>
    <div class="container">
        <p>Quantity of Codes : <span class="promo">{{$coupon['coupon_qty']}}</span></p>
        <p>Your Promo Code : <span class="promo">{{$coupon['coupon_code']}}</span></p>
        <p class="expire">Start from : {{$coupon['start_coupon']}}</p>
        <p class="expire">End day : {{$coupon['end_coupon']}}</p>
    </div>
</div>

</body>
</html>

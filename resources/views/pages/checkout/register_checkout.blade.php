<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/1.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/1.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Fresh Fruit</title>

   {{-- Login checkout --}}
     <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/css/style.css')}}">
    {{-- End Login checkout --}}
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
            @endif
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <center><h2 class="form-title">Register</h2></center>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="customer_name" id="name" placeholder="User Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="customer_email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="customer_password" id="pass" placeholder="You Password"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="customer_phone" id="phone" placeholder="Your Phone"/>
                            </div>
                            <div class="form-group form-button">
                                <center><input type="submit" class="form-submit" value="Đăng Ký"/></center>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('public/frontend/login-checkout/images/logo1.png')}}" style="width: 100%;" alt="sing up image"></figure>
                        <a href="{{URL::to('/login-checkout')}}" class="signup-image-link">Already have an account</a>
                    </div>
                </div>
            </div>
        </section>


    </div>

       {{-- Login checkout --}}
    <script src="{{asset('public/frontend/login-checkout/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/login-checkout/js/main.js')}}"></script>
    {{-- End Login checkout --}}
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

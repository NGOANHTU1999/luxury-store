<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/1.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/1.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Luxury-Store</title>

{{-- Login checkout --}}
<!-- Font Icon -->
    <link rel="stylesheet"
          href="{{asset('public/frontend/login-checkout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/css/style.css')}}">
    {{-- End Login checkout --}}
</head>
<body>

<div class="main">

    <!-- Sing in  Form -->
    <section class="sign-in">
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
            <div class="signin-content">
                <div class="signin-image ">
                    <figure><img src="{{asset('public/frontend/login-checkout/images/logo1.png')}} "
                                 alt="sing up image" style="width: 100%;"></figure>
                    <a style="width: 100px;float: left;text-align: center;" href="{{URL::to('/register-checkout')}}"
                       class="signup-image-link">Create New Account</a>
                    <a href="{{URL::to('/trang-chu')}}" class="signup-image-link">Return Home Page</a>
                </div>

                <div class="signin-form">
                    <center><h2 class="form-title">Login</h2></center>
                    <form action="{{URl::to('/login-customer')}}" method="POST" class="register-form" id="login-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="account_name" id="your_name" placeholder="User Name"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="account_password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                            <a style="margin-left: 20px;" href="{{URL::to('/reset-password')}}"><label
                                    class="label-agree-term"><span><span></span></span>Forgot Password</label></a>
                        </div>
                        <div class="form-group form-button">
                            <center><input type="submit" name="signin" id="signin" class="form-submit"
                                           value="Đăng Nhập"/></center>
                        </div>
                    </form>
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

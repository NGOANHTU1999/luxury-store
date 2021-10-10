<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/1.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/1.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Password</title>

{{-- Reset Password --}}
<!-- Font Icon -->
    <link rel="stylesheet"
          href="{{asset('public/frontend/login-checkout/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/login-checkout/css/style.css')}}">
    {{--Reset Password --}}
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
                    <figure><img src="{{asset('public/frontend/login-checkout/images/logo1.png')}}" style="width: 100%;"
                                 alt="sing up image"></figure>
                </div>

                @php
                    $token = $_GET['token'];
                    $email = $_GET['email'];
                @endphp

                <div class="signin-form">
                    <h2 class="form-title">Update Password</h2>
                    <form action="{{url('/update-password-new')}}" method="POST" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">

                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="hidden" name="email" value="{{$email}}"/>
                            <input type="hidden" name="token" value="{{$token}}"/>
                            <input type="Password" name="password_account" id="your_name"
                                   placeholder="Add New Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Cập nhập"/>
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

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/1.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/1.png')}}">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$meta_title}}</title>
    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"-->
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{$url_canonical}}"/>
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href=""/>
    <!---------Seo--------->
    <!---------Share fb--------->
    <meta property="og:url" content="{{$url_canonical}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$meta_title}}"/>
    <meta property="og:description" content="{{$meta_desc}}"/>
{{-- <meta property="og:image"         content="" /> --}}
<!---------End share fb--------->

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/lightslider.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/lightgallery.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('public/frontend/css/prettify.css')}}" type="text/css">

    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>
<body>
<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-phone"></i> HotLine : 0902077717</li>
                            <li><i class="fa fa-clock-o"></i>Open From 8 AM - 10 PM</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <image src="{{URL::to('public/frontend/image/language1.png')}}" with="20px" height="20px"
                                   alt="">
                                <div>{{__('Language')}}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{{URL::to('language',['en'])}}">English</a></li>
                                    <li><a href="{{URL::to('language',['vi'])}}">Vietnamese</a></li>
                                </ul>
                        </div>

                        <div class="header__top__right__language">
                            {{-- kiểm tra id khách hàng nếu chưa bắt đăng nhập --}}
                            <?php
                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL) {

                            ?>
                            <i class="fa fa-user"></i>
                            <div>{{__('Information')}}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{URL::to('/history-order')}}">{{__('History')}}</a></li>
                                </a></li>
                                <li><a href="{{URL::to('/logout-checkout')}}">{{__('Logout')}}</a></li>
                            </ul>
                            <?php
                            }else{
                            ?>

                            <i class="fa fa-user"></i><a href="{{URL::to('/login-checkout')}}">
                                <div style="margin-left: 5px;">{{__('Login')}}</div>
                            </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="{{-- header__logo --}}">
                    <center><a href="{{URL::to('/trang-chu')}}">
                            <image style="display: block;padding:6px;max-height:150px;width: auto;height: auto;"
                                   src="{{URL::to('public/frontend/image/logo2.png')}}" alt="logo">
                        </a></center>
                </div>
            </div>
            <div class="col-lg-6" >
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{URL::to('/trang-chu')}}">{{__('Home')}}</a></li>

                        <li><a href="{{URL::to('/tin-tuc')}}">{{__('Blogs')}}</a></li>

                        <li><a href="{{URL::to('/lien-he')}}">{{__('Contact')}}</a></li>
                        <?php
                        $customer_id = Session::get('customer_id');
                        if ($customer_id != NULL) {

                        ?>
                        <li><a href="{{URL::to('/gio-hang')}}">{{__('Cart')}}</a></li>
                        <?php
                        }else{
                        ?>

                        <li><a href="{{URL::to('/login-checkout')}}">{{__('Cart')}}</a></li>
                        <?php
                        }
                        ?>

                        <?php
                        $customer_id = Session::get('customer_id');
                        $shipping_id = Session::get('shipping_id');
                        if ($customer_id != NULL && $shipping_id == NULL ) {

                        ?>
                        <li><a href="{{URL::to('/checkout')}}">{{__('Payment')}}</a></li>
                        <?php
                        }elseif($customer_id != NULL && $shipping_id != NULL ){
                        ?>
                        <li><a href="{{URL::to('/payment')}}">{{__('Payment')}}</a></li>
                        <?php
                        }else{
                        ?>
                        <li><a href="{{URL::to('/login-checkout')}}">{{__('Payment')}}</a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </nav>
            </div>

            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li id="show-cart"></li>
                    </ul>
                    <div class="header__cart__price" id="total-home"></div>
                </div>
            </div>

        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

    <div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 style="text-align: center;" class="modal-title">{{__('Quét Mã Qr Của Bạn')}}</h5>
                    <button type="button" onclick="close();" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <video style="" id="preview" width="100%"></video>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Header Section End -->

<!-- Hero Section Begin -->

<!-- Hero Section End -->

<!-- Categories Section Begin -->

<!-- Categories Section End -->
<!-- Featured Section Begin -->

@yield('content')
<!-- Banner Begin -->
<!-- Banner End -->

<!-- Latest Product Section Begin -->

<!-- Latest Product Section End -->

<!-- Blog Section Begin -->

<!-- Blog Section End -->
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            @foreach($contact_info as $key => $ci)

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <br>
                    <div class="footer__about">
                        <center><h5>{{__('Address')}}</h5></center>
                        <div class="footer__about__logo">
                            <a href="{{URL::to('/trang-chu')}}">
                                <image width="300" height="150"
                                       src="{{URL::to('public/upload/contact/'.$ci->info_logo)}}" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>{!!$ci->info_contact!!}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <br>
                    <div class="footer__about">
                        <center><h5>{{__('Policies')}}</h5></center>
                        <ul>
                            @foreach($post_huuich as $key => $huuich)
                                <li><a href="{{URL::to('/bai-viet/'.$huuich->post_slug)}}">{{$huuich->post_title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <br>
                    <center><h5>{{__('Map')}}</h5></center>
                    <center>{!!$ci->info_map!!}</center>
                </div>
        </div>
        @endforeach
    </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>

<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>

<script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>

<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('public/frontend/js/main.js')}}"></script>

<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>

<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>

<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>

<script src="{{asset('public/frontend/js/prettify.js')}}"></script>

{{-- script share fb --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
        nonce="W6aseqG5"></script>
{{-- end script --}}

{{--Comment--}}
<script type="text/javascript">
    $(document).ready(function () {
        load_comment();

        function load_comment() {
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data: {product_id: product_id, _token: _token},
                success: function (data) {

                    $('#comment_show').html(data);
                }
            });
        }

        $('.send-comment').click(function () {
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data: {
                    product_id: product_id,
                    comment_name: comment_name,
                    comment_content: comment_content,
                    _token: _token
                },
                success: function (data) {
                    location.reload();
                }
            });
        });
    });
</script>

{{--Cancle Order--}}
<script type="text/javascript">
    function Huydonhang(id) {
        var order_code = id;
        var lydo = $('.lydohuydon').val();

        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{url('/huy-don-hang')}}',
            method: "POST",

            data: {order_code: order_code, lydo: lydo, _token: _token},
            success: function (data) {
                location.reload();
            }

        });
    }
</script>

{{--Gallery Product--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#imageGallery').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 3,
            slideMargin: 0,
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function (el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
</script>
{{--End Gallery Product--}}

{{--Rating Star--}}
<script type="text/javascript">
    function remove_background(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#fff');
        }
    }

    //hover chuột đánh giá sao
    $(document).on('mouseenter', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        // alert(index);
        // alert(product_id);
        remove_background(product_id);
        for (var count = 1; count <= index; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });

    //nhả chuột ko đánh giá
    $(document).on('mouseleave', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");
        remove_background(product_id);
        //alert(rating);
        for (var count = 1; count <= rating; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });

    //click đánh giá sao
    $(document).on('click', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('insert-rating')}}",
            method: "POST",
            data: {index: index, product_id: product_id, _token: _token},
            success: function (data) {
                if (data == 'done') {
                    location.reload();
                } else {
                    alert("Lỗi đánh giá");
                }
            }
        });
    });
</script>

{{-- add số lượng --}}
<script>//<![CDATA[
    $('input.input-qty').each(function () {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function () {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
</script>
{{-- end add số lượng --}}

<script>
    $('#dialog1').modal('show')

    function scanqr() {
        let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
        scanner.addListener('scan', function (content) {
            window.location.href = content;
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    }
</script>

{{-- sản phẩm yêu thích javascript --}}
<script type="text/javascript">
    function del_wishList(id) {
        if (localStorage.getItem('data') != null) {
            var data = JSON.parse(localStorage.getItem('data'));
            var index = data.findIndex(item => item.id == id);
            // alert(index);
            data.splice(index, 1);
            localStorage.setItem('data', JSON.stringify(data));

            document.getElementById("delete" + id).remove();
        }
    }

    function view() {

        if (localStorage.getItem('data') != null) {

            var data = JSON.parse(localStorage.getItem('data'));

            data.reverse();// đảo ngược sản phẩm mới lên đầu

            document.getElementById('row_wishlist')
            document.getElementById('row_wishlist').style.height = '400px';

            for (i = 0; i < data.length; i++) {

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var id = data[i].id;

                $('#row_wishlist').append('<div class="row" id="delete' + id + '" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="' + image + '"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#FE980F">' + price + '</p><a class="abc" href="' + url + '">Đặt hàng</a><a class="abc" style="margin-left:5px; color: #f22112"  onclick="del_wishList(' + id + ')">Xóa</a></div>');
            }
        }
    }

    view();

    function add_wistlist(clicked_id) {

        var id = clicked_id;
        var name = document.getElementById('wishlist_productname' + id).value;
        var price = document.getElementById('wishlist_productprice' + id).value;
        var image = document.getElementById('wishlist_productimage' + id).src;
        var url = document.getElementById('wishlist_producturl' + id).href;
        var newItem = {
            'url': url,
            'id': id,
            'name': name,
            'price': price,
            'image': image
        }
        //kiem tra neu chua co thi set la rong
        if (localStorage.getItem('data') == null) {
            localStorage.setItem('data', '[]');
        }
        //neu co roi thi lay lai
        var old_data = JSON.parse(localStorage.getItem('data'));

        var matches = $.grep(old_data, function (obj) {
            return obj.id == id;
        })

        if (matches.length) {
            alert('{{__('The product you have added to your favorites list, so you can not add it.')}}');

        } else {

            old_data.push(newItem);

            $('#row_wishlist').append('<div class="row" id="delete' + id + '" style="margin:10px 0;"><div class="col-md-4"><img width="100%" src="' + newItem.image + '"></div><div class="col-md-8 info_wishlist"><p>' + newItem.name + '</p><p style="color:#FE980F">' + newItem.price + '</p><a class="abc" href="' + newItem.url + '">Order</a><a class="abc" style="margin-left:5px" onclick="del_wishList(' + id + ')">Delete</a></div>');

        }
        localStorage.setItem('data', JSON.stringify(old_data));
    }
</script>
{{-- end sản phẩm yêu thích --}}

{{-- script sweetalert --}}
<script type="text/javascript">
    show_cart();//đếm giỏ hàng
    total_home();

    function show_cart() {
        $.ajax({
            url: '{{url('/show-cart')}}',
            method: "GET",
            success: function (data) {
                $('#show-cart').html(data);
            }

        });
    }

    //total home
    function total_home() {
        $.ajax({
            url: '{{url('/total-home')}}',
            method: "GET",
            success: function (data) {
                $('#total-home').html(data);
            }
        });
    }

    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var _token = $('input[name="_token"]').val();

            if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                if (parseInt(cart_product_quantity) == 0) {
                    swal("{{__('Please contact: 0902077717 to order!')}}");
                } else {
                    swal("{{__('Please Enter Smaller Quantities')}} " + cart_product_quantity, "", "warning");
                }
            } else {
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                        cart_product_quantity: cart_product_quantity
                    },
                    success: function () {
                        swal({
                                title: "{{__('Your Product Added to Cart')}}",
                                text: "{{__('Continue To Shopping or Pay')}}",
                                showCancelButton: true,
                                cancelButtonText: "{{__('Continue Shopping')}}",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "{{__('Go to Cart')}}",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                        show_cart();
                        total_home();
                    }
                });
            }
        });
    });
</script>

{{-- phí vận chuyển --}}
<script type="text/javascript">

    $(document).ready(function () {
        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-city-home')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.calculate').click(function () {
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' || maqh == '' || xaid == '') {
                swal("{{__('Error!')}}", "{{__('Please select the information to charge for shipping !')}}", "info");
            } else {
                $.ajax({
                    url: '{{url('/calculate-ship')}}',
                    method: 'POST',
                    data: {matp: matp, maqh: maqh, xaid: xaid, _token: _token},
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.null-fee').click(function () {
            swal("{{__('Error!')}}", "{{__('Please select the shipping fee above !')}}", "warning");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.null-customer').click(function () {
            swal("{{__('You Have not Logged in Yet !')}}", "{{__('Sign in to Continue!')}}", "info");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.null-cart').click(function () {
            swal("{{__('Empty Cart !')}}", "{{__('Please Add More Products to Continue!')}}", "info");
        });
    });
</script>
{{-- end phí vận chuyển --}}

{{-- send-order --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.send-order').click(function () {
            swal({
                    title: "{{__('Your order')}}",
                    text: "{{__('The order will not be refunded after the order, do you want to continue?')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "{{__('Continue!')}}",
                    cancelButtonText: "{{__('Cancel!')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },

                function (isConfirm) {
                    if (isConfirm) {
                        var shipping_name = $('.shipping_name').val();
                        var shipping_city = $('.shipping_city').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_email = $('.shipping_email').val();
                        var shipping_note = $('.shipping_note').val();
                        var shipping_method = $("input[name='payment']:checked").val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();
                        // alert(shipping_method);
                        if (shipping_method == 0) {
                            $.ajax({
                                url: '{{url('/payment-online')}}',
                                method: 'POST',
                                data: {
                                    shipping_name: shipping_name,
                                    shipping_city: shipping_city,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_email: shipping_email,
                                    shipping_note: shipping_note,
                                    shipping_method: shipping_method,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    _token: _token
                                },
                                success: function () {
                                    $(location).attr('href', 'thanh-toan');
                                }
                            });
                        } else {
                            $.ajax({
                                url: '{{url('/save-order')}}',
                                method: 'POST',
                                data: {
                                    shipping_name: shipping_name,
                                    shipping_city: shipping_city,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_email: shipping_email,
                                    shipping_note: shipping_note,
                                    shipping_method: shipping_method,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    _token: _token
                                },
                                success: function () {
                                    swal("{{__('Orders !')}}", "{{__('Thank you for ordering, your order is being processed !')}}", "success");
                                    window.setTimeout(function () {
                                        window.location.href = "{{url('/history-order')}}";
                                    }, 1000);
                                }, error: function () {
                                    swal("{{__('Please !')}}", "{{__('Thank you for ordering, your order is being processed !')}}", "success");
                                }
                            });
                        }
                    } else {
                        swal("{{__('Cancle!')}}", "{{__('Your order has not been placed')}}", "error");
                    }
                });
        });
    });
</script>
{{-- end send-order --}}
</body>
</html>

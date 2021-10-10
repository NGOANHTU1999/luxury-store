<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/backend/assets/img/1.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/backend/assets/img/1.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>
        Dashboard LUXURY-STORE
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/css/fonts-family.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/font-awesome.min.css')}}">
    <!-- CSS Files -->
    <link href="{{asset('public/backend/assets/css/material-dashboard.minf066.css?v=2.1.0')}}" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('public/backend/assets/demo/demo.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/bootstrap-wysihtml5.css')}}"/>

    {{-- datepicker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- end datepicker --}}

    {{-- morris --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{-- end morris --}}
</head>

<body class="">
<!-- Extra details for Live View on GitHub Pages -->
<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black"
         data-image="{{asset('public/backend/assets/img/sidebar-1.jpg')}}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
        -->
        <div class="logo">
            <a href="" class="simple-text logo-mini">

            </a>
            <a href="{{URL::to('/trang-chu')}}" class="simple-text logo-normal">
                LUXURY-STORE
            </a>

        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('public/backend/assets/img/faces/avatar.png')}}"/>
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>{{__('Hello')}}
                  <?php
                  $name = Auth::user()->admin_name;
                  if ($name) {
                      echo $name;
                  }
                  ?>
              </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                @hasrole(['admin'])
                <li class="nav-item " >
                    <a class="nav-link" data-toggle="collapse" href="#category">
                        <i class="fa fa-list"></i>
                        <p>{{__('Category Product')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav">
                            <li class="nav-item" >
                                <a class="nav-link" href="{{URl::to('/add-category-product')}}">
                                    <span class="sidebar-mini"> DM </span>
                                    <span class="sidebar-normal"> {{__('Add Category')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-category-product')}}">
                                    <span class="sidebar-mini"> DM </span>
                                    <span class="sidebar-normal"> {{__('List Category')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#brand">
                        <i class="fa fa-list"></i>
                        <p> {{__('Brand Product')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="brand">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URl::to('/add-brand-product')}}">
                                    <span class="sidebar-mini"> TH </span>
                                    <span class="sidebar-normal"> {{__('Add Brand')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-brand-product')}}">
                                    <span class="sidebar-mini"> TH </span>
                                    <span class="sidebar-normal">{{__('List Brand')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#product">
                        <i class="fa fa-shopping-cart"></i>
                        <p> {{__('Product')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/add-product')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal">{{__('Add Product')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-product')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal"> {{__('List Product')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#coupon">
                        <i class="material-icons">local_offer</i>
                        <p> {{__('Promo Code')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="coupon">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URl::to('/add-coupon')}}">
                                    <span class="sidebar-mini"> MGG </span>
                                    <span class="sidebar-normal"> {{__('Add Promo Code')}}</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URl::to('/all-coupon')}}">
                                    <span class="sidebar-mini"> MGG </span>
                                    <span class="sidebar-normal"> {{__('List Promo Code')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item ">
                    <a class="nav-link" href="{{URl::to('/add-ship')}}">
                        <i class="material-icons">local_shipping</i>
                        <p> {{__('Shipping fee')}} </p>
                    </a>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item ">
                    <a class="nav-link" href="{{URL::to('/manage-order')}}">
                        <i class="fa fa-print"></i>
                        <p>Order Management</p>
                    </a>
                </li>
                @endhasrole

                @hasrole(['author'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#BlogExamples">
                        <i class="material-icons">reorder</i>
                        <p> {{__('Category Blogs')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="BlogExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URl::to('/add-category-blog')}}">
                                    <span class="sidebar-mini"> DM </span>
                                    <span class="sidebar-normal"> {{__('Add Category Blog')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-category-blog')}}">
                                    <span class="sidebar-mini"> DM </span>
                                    <span class="sidebar-normal"> {{__('List Category Blogs')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['author'])
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#PostExamples">
                        <i class="fa fa-newspaper-o"></i>
                        <p> {{__('Blogs')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="PostExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URl::to('/add-post')}}">
                                    <span class="sidebar-mini"> BV </span>
                                    <span class="sidebar-normal"> {{__('Add Blogs')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-post')}}">
                                    <span class="sidebar-mini"> BV </span>
                                    <span class="sidebar-normal"> {{__('List Blogs')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['author'])
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#Slider">
                        <i class="fa fa-image"></i>
                        <p> {{__('Slider')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Slider">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/add-slider')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal"> {{__('Add Slider')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-slider')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal">{{__('List Slider')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['author'])
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#Footer">
                        <i class="material-icons">build</i>
                        <p> {{__('Footer')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Footer">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/layout-footer')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal"> {{__('Add Footer')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-footer')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal">{{__('List Footer')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['author'])
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ads">
                        <i class="material-icons">ads_click</i>
                        <p> {{__('Advertisement')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="ads">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/add-ads')}}">
                                    <span class="sidebar-mini"> SP </span>
                                    <span class="sidebar-normal"> {{__('Add Advertisement')}} </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{URL::to('/all-ads')}}">
                                    <span class="sidebar-mini"> SP </span>
                                        <span class="sidebar-normal"> {{__('List Advertisement')}} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endhasrole

                @hasrole(['admin'])
                <li class="nav-item ">
                    <a class="nav-link" href="{{URL::to('/all-user')}}">
                        <i class="fa fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                @endhasrole

                @impersonate
                <li class="nav-item ">
                    <a class="nav-link" href="{{URL::to('/impersonate-destroy')}}">
                        <i class="fa fa-ban"></i>
                        <p> Stop Change</p>
                    </a>
                </li>
                @endimpersonate
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{URL::to('/dashboard')}}">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownLanguage" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">g_translate</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLanguage">
                                <a class="dropdown-item" href="{{URL::to('language',['en'])}}"><img
                                        src="https://dkmh.tdmu.edu.vn/App_Themes/Standard/Images/US.gif" height="20"
                                        width="30"><span style="margin-left:5px;">English</span></a>
                                <a class="dropdown-item" href="{{URL::to('language',['vi'])}}"><img
                                        src="https://dkmh.tdmu.edu.vn/App_Themes/Standard/Images/VI.gif" height="20"
                                        width="30"><span style="margin-left:5px;">Vietnamese</span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">{{$count_order_dashboard}}</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($order_new_dashboard as $key => $n)
                                    <a class="dropdown-item"
                                       href="{{URL::to('/view-order/'.$n->order_code)}}">{{__('New Orders')}} {{$n->order_code}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">logout</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="{{URL::to('/logout-auth')}}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="content">
                @yield('admin_content')
                <footer class="footer">

                </footer>
            </div>
        </div>
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Filters</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger active-color">
                            <div class="badge-colors ml-auto mr-auto">
                                <span class="badge filter badge-purple" data-color="purple"></span>
                                <span class="badge filter badge-azure" data-color="azure"></span>
                                <span class="badge filter badge-green" data-color="green"></span>
                                <span class="badge filter badge-warning" data-color="orange"></span>
                                <span class="badge filter badge-danger" data-color="danger"></span>
                                <span class="badge filter badge-rose active" data-color="rose"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="header-title">Sidebar Background</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="ml-auto mr-auto">
                                <span class="badge filter badge-black active" data-background-color="black"></span>
                                <span class="badge filter badge-white" data-background-color="white"></span>
                                <span class="badge filter badge-red" data-background-color="red"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Sidebar Mini</p>
                            <label class="ml-auto">
                                <div class="togglebutton switch-sidebar-mini">
                                    <label>
                                        <input type="checkbox">
                                        <span class="toggle"></span>
                                    </label>
                                </div>
                            </label>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Sidebar Images</p>
                            <label class="switch-mini ml-auto">
                                <div class="togglebutton switch-sidebar-image">
                                    <label>
                                        <input type="checkbox" checked="">
                                        <span class="toggle"></span>
                                    </label>
                                </div>
                            </label>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="header-title">Images</li>
                    <li class="active">
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="{{asset('public/backend/assets/img/sidebar-1.jpg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="{{asset('public/backend/assets/img/sidebar-2.jpg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="{{asset('public/backend/assets/img/sidebar-3.jpg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="javascript:void(0)">
                            <img src="{{asset('public/backend/assets/img/sidebar-4.jpg')}}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

        <script src="{{asset('public/backend/assets/js/core/popper.min.js')}}"></script>

        <script src="{{asset('public/backend/assets/js/core/bootstrap-material-design.min.js')}}"></script>

        <script src="{{asset('public/backend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{asset('public/backend/assets/js/plugins/moment.min.js')}}"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{asset('public/backend/assets/js/plugins/sweetalert2.js')}}"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{asset('public/backend/assets/js/plugins/jquery.validate.min.js')}}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{asset('public/backend/assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
        <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{asset('public/backend/assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{asset('public/backend/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{asset('public/backend/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
        <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{asset('public/backend/assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{asset('public/backend/assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{asset('public/backend/assets/js/plugins/fullcalendar.min.js')}}"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{asset('public/backend/assets/js/plugins/jquery-jvectormap.js')}}"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{asset('public/backend/assets/js/plugins/nouislider.min.js')}}"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="{{asset('public/backend/assets/js/core-js/2.4.1/core.js')}}"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{asset('public/backend/assets/js/plugins/arrive.min.js')}}"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="{{asset('public/backend/assets/js/plugins/buttons.js')}}"></script>
        <!-- Chartist JS -->
        <script src="{{asset('public/backend/assets/js/plugins/chartist.min.js')}}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{asset('public/backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script
            src="{{asset('public/backend/assets/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript')}}"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{asset('public/backend/assets/demo/demo.js')}}"></script>

        <script src="{{asset('public/backend/assets/js/bootstrap-wysihtml5.js')}}"></script>

        <script src="{{asset('public/backend/assets/js/wysihtml5-0.3.0.js')}}"></script>

        <script src="{{asset('public/backend//js/simple.money.format.js')}}"></script>

        {{-- Link Validation JS --}}
        <script src="{{asset('public/backend/assets/js/formValidation.min.js')}}"></script>

        <script type="text/javascript">
            $.validate({});
        </script>
        {{-- CKEditor 4 --}}
        <script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
        </script>
        {{-- end CKEditor --}}
        {{-- datepicker --}}
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        {{-- end datepicker --}}

        {{-- morris --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        {{-- end morris --}}

        {{--Add Gallery--}}
        <script type="text/javascript">

            load_gallery();

            function load_gallery() {
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();
                // alert(pro_id);
                $.ajax({
                    url: "{{url('/select-gallery')}}",
                    method: "POST",
                    data: {pro_id: pro_id, _token: _token},
                    success: function (data) {
                        $('#gallery_load').html(data);
                    }
                });
            }

            $('#file').change(function () {
                var error = '';
                var files = $('#file')[0].files;

                if (files.length > 20) {
                    error += '<p>You can choose up to 20 photos</p>';
                } else if (files.length == '') {
                    error += '<p>You can not have a blank photo</p>';
                } else if (files.size > 2000000) {
                    error += '<p>Photos cannot be larger than 2MB</p>';
                }

                if (error == '') {
                } else {
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
                    return false;
                }
            });

            $(document).on('blur', '.edit_gal_name', function () {
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/update-gallery-name')}}",
                    method: "POST",
                    data: {gal_id: gal_id, gal_text: gal_text, _token: _token},
                    success: function (data) {
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Update image name successfully</span>');
                    }
                });
            });

            $(document).on('click', '.delete-gallery', function () {
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();
                if (confirm('Do you want to delete this image?')) {
                    $.ajax({
                        url: "{{url('/delete-gallery')}}",
                        method: "POST",
                        data: {gal_id: gal_id, _token: _token},
                        success: function (data) {
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Delete image successfully</span>');
                        }
                    });
                }
            });

            $(document).on('change', '.file_image', function () {

                var gal_id = $(this).data('gal_id');
                var image = document.getElementById("file-" + gal_id).files[0];
                var form_data = new FormData();
                form_data.append("file", document.getElementById("file-" + gal_id).files[0]);
                form_data.append("gal_id", gal_id);

                $.ajax({
                    url: "{{url('/update-gallery')}}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,

                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Update image successful</span>');
                    }
                });
            });
        </script>
        {{--End Gallery--}}

        {{-- slug --}}
        <script type="text/javascript">
            function ChangeToSlug() {
                var slug;
                //Lấy text từ thẻ input title
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
        </script>
        {{-- end slug --}}

        {{-- update qty order --}}
        <script type="text/javascript">
            $('.update_qty_order').click(function () {
                var order_product_id = $(this).data('product_id');
                var order_qty = $('.order_qty_' + order_product_id).val();
                var order_code = $('.order_code').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/update-qty')}}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        order_product_id: order_product_id,
                        order_qty: order_qty,
                        order_code: order_code
                    },
                    success: function (data) {
                        alert('Cap nhap thanh cong')
                        location.reload();
                    }
                });
            });
        </script>
        {{--end update qty order --}}

        {{-- xu li don hang --}}
        <script type="text/javascript">
            $('.order_details').change(function () {
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();
                //lay ra so luong
                qty = [];
                $("input[name='product_qty']").each(function () {
                    qty.push($(this).val());
                });
                //lay ra product id
                order_product_id = [];
                $("input[name='order_product_id']").each(function () {
                    order_product_id.push($(this).val());
                });
                j = 0;
                for (i = 0; i < order_product_id.length; i++) {
                    //so luong khach dat
                    var order_qty = $('.order_qty_' + order_product_id[i]).val();
                    //so luong ton kho
                    var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                    if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                        j = j + 1;
                        if (j == 1) {
                            alert('The quantity of products in stock is not enough !');
                        }
                        $('.color_qty_' + order_product_id[i]).css('background-color', '#ec407a');
                    }
                }
                if (j == 0) {
                    $.ajax({
                        url: '{{url('/order-update-qty')}}',
                        method: 'POST',
                        data: {
                            _token: _token,
                            order_status: order_status,
                            order_id: order_id,
                            order_product_id: order_product_id,
                            qty: qty
                        },
                        success: function (data) {
                            location.reload();
                        }
                    });
                }
            });
        </script>
        {{-- end xu li don hang --}}

        <script>
            $(document).ready(function () {
                $().ready(function () {
                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                        }
                    }

                    $('.fixed-plugin a').click(function (event) {
                        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .active-color span').click(function () {
                        $full_page_background = $('.full-page-background');

                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                        }
                    });

                    $('.fixed-plugin .background-color .badge').click(function () {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('background-color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });

                    $('.fixed-plugin .img-holder').click(function () {
                        $full_page_background = $('.full-page-background');

                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');


                        var new_image = $(this).find("img").attr('src');

                        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function () {
                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }

                        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function () {
                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                $full_page_background.fadeIn('fast');
                            });
                        }

                        if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                        }
                    });

                    $('.switch-sidebar-image input').change(function () {
                        $full_page_background = $('.full-page-background');

                        $input = $(this);

                        if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar_img_container.fadeIn('fast');
                                $sidebar.attr('data-image', '#');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page_background.fadeIn('fast');
                                $full_page.attr('data-image', '#');
                            }

                            background_image = true;
                        } else {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar.removeAttr('data-image');
                                $sidebar_img_container.fadeOut('fast');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page.removeAttr('data-image', '#');
                                $full_page_background.fadeOut('fast');
                            }

                            background_image = false;
                        }
                    });

                    $('.switch-sidebar-mini input').change(function () {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function () {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function () {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function () {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });
                });
            });
        </script>

        <!-- Sharrre libray -->
        <script src="{{asset('public/backend/assets/demo/jquery.sharrre.js')}}"></script>
        <script>
            $(document).ready(function () {

                $('#facebook').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    },
                    template: '<i class="fab fa-facebook-f"></i> Facebook',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                });

                $('#google').sharrre({
                    share: {
                        googlePlus: true
                    },
                    enableCounter: false,
                    enableHover: false,
                    enableTracking: true,
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    },
                    template: '<i class="fab fa-google-plus"></i> Google',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                });

                $('#twitter').sharrre({
                    share: {
                        twitter: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    buttons: {
                        twitter: {
                            via: 'CreativeTim'
                        }
                    },
                    click: function (api, options) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    },
                    template: '<i class="fab fa-twitter"></i> Twitter',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                });
            });
        </script>

        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"/>
        </noscript>

        <script>
            $(document).ready(function () {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();

                md.initVectorMap();
            });
        </script>

        <script>
            $('.textarea_editor').wysihtml5();
        </script>

        <script>
            $(document).ready(function () {
                $('#datatables').DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [1, 25, 50, -1],
                        [1, 25, 50, "All"]
                    ],
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                    }
                });

                var table = $('#datatable').DataTable();

                // Edit record
                table.on('click', '.edit', function () {
                    $tr = $(this).closest('tr');
                    var data = table.row($tr).data();
                    alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
                });

                // Delete a record
                table.on('click', '.remove', function (e) {
                    $tr = $(this).closest('tr');
                    table.row($tr).remove().draw();
                    e.preventDefault();
                });

                //Like record
                table.on('click', '.like', function () {
                    alert('You clicked on Like button');
                });
            });
        </script>

        {{-- ajax ship --}}
        <script type="text/javascript">
            $(document).ready(function () {
                fetch_delivery();

                function fetch_delivery() {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/manage-ship')}}',
                        method: 'POST',
                        data: {_token: _token},
                        success: function (data) {
                            $('#load_delivery').html(data);
                        }
                    });
                }

                $(document).on('blur', '.fee_ship_edit', function () {

                    var feeship_id = $(this).data('feeship_id');
                    var fee_value = $(this).text();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/update-ship')}}',
                        method: 'POST',
                        data: {feeship_id: feeship_id, fee_value: fee_value, _token: _token},
                        success: function (data) {
                            fetch_delivery();
                        }
                    });
                });
                $('.add_ship').click(function () {
                    var city = $('.city').val();
                    var province = $('.province').val();
                    var wards = $('.wards').val();
                    var fee_ship = $('.fee_ship').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/save-ship')}}',
                        method: 'POST',
                        data: {city: city, province: province, _token: _token, wards: wards, fee_ship: fee_ship},
                        success: function (data) {
                            fetch_delivery();
                        }
                    });
                })
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
                        url: '{{url('/select-city')}}',
                        method: 'POST',
                        data: {action: action, ma_id: ma_id, _token: _token},
                        success: function (data) {
                            $('#' + result).html(data);
                        }
                    });
                });
            });
        </script>

        {{-- datepicker --}}
        <script type="text/javascript">
            $(function () {
                $("#datepicker").datepicker({
                    prevText: "Last Month",
                    nextText: "Next Month",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
                    duration: "slow"
                });
                $("#datepicker2").datepicker({
                    prevText: "Last Month",
                    nextText: "Next Month",
                    dateFormat: "yy-mm-dd",
                    dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
                    duration: "slow"
                });
            });
        </script>
        {{-- end datepicker --}}

        {{-- datepicker coupon --}}
        <script type="text/javascript">
            $(function () {
                $("#startcoupon").datepicker({
                    prevText: "Last Month",
                    nextText: "Next Month",
                    dateFormat: "dd-mm-yy",
                    dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
                    duration: "slow"
                });
                $("#endcoupon").datepicker({
                    prevText: "Last Month",
                    nextText: "Next Month",
                    dateFormat: "dd-mm-yy",
                    dayNamesMin: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
                    duration: "slow"
                });
            });
        </script>
        {{-- end datepicker coupon --}}

        {{-- morris chart biểu đồ Area  --}}
        <script type="text/javascript">
            $(document).ready(function () {

                chart60daysorder();
                var chart = new Morris.Area({
                    element: 'chart',
                    lineColors: ['#ec407a', '#ffa726', '#26c6da', '#FFA500'],
                    xkey: 'period',
                    ykeys: ['order', 'sales', 'quantity'],
                    labels: ['Order', 'Sales', 'Quantity'],
                    fillOpacity: 0.3,
                    hideHover: 'auto',
                    parseTime: false,
                    behaveLikeLine: true,
                    resize: true,
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors: ['#ec407a'],
                });

                function chart60daysorder() {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/days-order')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {_token: _token},
                        success: function (data) {
                            chart.setData(data);
                        }
                    });
                }

                $('#btn-dashboard-filter').click(function () {
                    var _token = $('input[name="_token"]').val();
                    var from_data = $('#datepicker').val();
                    var to_date = $('#datepicker2').val();
                    $.ajax({
                        url: "{{url('/filter-by-date')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {_token: _token, from_data: from_data, to_date: to_date},
                        success: function (data) {
                            chart.setData(data);
                        }
                    });
                });

                $('.dashboard-filter').change(function () {
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/dashboard-filter')}}",
                        method: "POST",
                        dataType: "JSON",
                        data: {dashboard_value: dashboard_value, _token: _token},
                        success: function (data) {
                            chart.setData(data);
                        }
                    });
                });
            });
        </script>
        {{-- end morris chart biểu đồ Area --}}

        {{-- Morris Donut Chart --}}
        <script type="text/javascript">
            var colorDanger = "#FF1744";
            Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    '#fa4251',
                    '#c211c2',
                    '#80DEEA',
                    '#006aff',
                    '#ffa805',
                    '#1fd1a5'
                ],

                data: [
                    {label: "{{__('Product')}}", value:<?php echo $product_donut ?>, color: colorDanger},
                    {label: "{{__('Brand Product')}}", value:<?php echo $brand_donut ?>},
                    {label: "{{__('Category Product')}}", value:<?php echo $category_donut  ?>},
                    {label: "{{__('Order')}}", value:<?php echo $order_donut ?>},
                    {label: "{{__('Customer')}}", value:<?php echo $customer_donut ?>},
                    {label: "{{__('Blogs')}}", value:<?php echo $post_donut ?>}
                ]
            });
        </script>
{{-- End Morris Donut Chart --}}

</body>
</html>

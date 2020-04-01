
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>John-Lewis-Opticians | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0072f6">
    <link rel="icon" type="image/png" href="/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="news_keywords" content="Glasses,Lens,Opticals,Mens Glasses,Women Glasses,Children Glasses,Shop Glasses Online,Eye Treatment,Eye Care" />
    <meta property="description" content="John Lewis Opticians  where you can check eyes for each and every patient and also sells glasses" />
    <meta property="keywords" content="Glasses | Lens |Optical"/>

    <!-- Bootstrap CSS-->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

{{--    <link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('frontend/css/owl.theme.default.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('frontend/css/owl.theme.css')}}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/bootstrap/css/bootstrap.min.css">--}}
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel/assets/owl.carousel.css">
   <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
{{--    <link href="{{asset('frontend/css/style.default.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/css/style.default.css" id="theme-stylesheet">
    <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/css/custom.css">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">


    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield('css_script')
</head>
<body>
<!-- navbar-->
<header class="header mb-5">
    <!--
    *** TOPBAR ***
    _________________________________________________________
    -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offer mb-3 mb-lg-0">
                    <ul class="top-header-address">
                        <li><i class="fa fa-envelope-o fa-2x"></i>123, New Lenox Chicago, IL 60606</li>
                        <li><i class="fa fa-phone fa-2x"></i>infoglass@gmail.com</li>


                    </ul>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <ul class="menu list-inline mb-0">
                        @if(Auth::check())
                            <li class="list-inline-item"><a href="{{route('profile')}}">Profile</a></li>
                            <li class="list-inline-item"><a href="{{route('logout')}}">Logout</a></li>
                        @else
                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li class="list-inline-item"><a href="{{route('register')}}">Register</a></li>
                        @endif
                        <li class="list-inline-item"><a href="{{route('contact-us.index')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customer login</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        {{Form::open(['route'=>'login','method'=>'post','id'=>'login'])}}
{{--                        <form action="customer-orders.html" method="post">--}}
                            <div class="form-group">
                                <input id="email-modal" id="email" name="email" type="text" placeholder="email" class="form-control">
                            </div>
                        <input type="hidden" name="url" id="url">
                            <div class="form-group">
                                <input id="password-modal" id="password" name="password" type="password" placeholder="password" class="form-control">
                            </div>
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        {{Form::close()}}
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="{{route('register')}}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- *** TOP BAR END ***-->


    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.html" class="navbar-brand home"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
            <div class="navbar-buttons">
                <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">

              @include('frontend.menu')
                @include('frontend.mobile')

                <div class="navbar-buttons d-flex justify-content-end">
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                        <a href="{{route('cart.index')}}" class="btn btn-primary navbar-btn">
                            <i class="fa fa-shopping-cart"></i>
                            @if(!empty($carts->items))

                                <span >  {{count($carts->items)}}  </span>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="search" class="collapse">
        <div class="container">
            <form role="search" class="ml-auto">
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>

@yield('content')
<!--
*** FOOTER ***
_________________________________________________________
-->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Pages</h4>
                <ul class="list-unstyled" id="footer-menu">
                    <li><a href="{{route('about-us')}}">About us</a></li>
                    <li><a href="{{route('contact-us.index')}}">Contact us</a></li>
                    <li><a href="{{route('shipping')}}">Shipping</a></li>
                    <li><a href="{{route('returns-refunds')}}">Returns & Refunds</a></li>
                    <li><a href="{{route('guarantee-warranty')}}">Guarantee & Warranty</a></li>
                    <li><a href="{{route('how-to-get-prescription')}}">How to get prescription</a></li>
                    <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>

                </ul>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Links</h4>

                <ul class="list-unstyled" id="footer-menu">
                    <li><a href="{{route('service.index')}}">Services</a></li>
                    <li><a href="{{route('blog.index')}}">Blogs</a></li>
                    <li><a href="{{route('nhs-entitlement')}}">NHS Entitlement</a></li>


                </ul>

            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Where to find us</h4>
                <p><strong>Obaju Ltd.</strong><br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p><a href="contact.html">Go to contact page</a>
                <hr class="d-block d-md-none">
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Get the news</h4>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control"><span class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary">Subscribe!</button></span>
                    </div>
                    <!-- /input-group-->
                </form>
                <hr>
                <h4 class="mb-3">Stay in touch</h4>
                <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#" class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
            </div>
            <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container-->
</div>
<!-- /#footer-->
<!-- *** FOOTER END ***-->


<!--
*** COPYRIGHT ***
_________________________________________________________
-->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2 mb-lg-0 text-center">
                <p class="text-center">©{{date('Y')}} John-Lewis-Opticians</p>
            </div>

        </div>
    </div>
</div>
<!-- *** COPYRIGHT END ***-->
{{--<a href="#" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm d-none d-lg-inline-block">--}}
{{--    <i class="fa fa-shopping-cart fa-2x"></i>--}}
{{--</a>--}}

<!-- JavaScript files-->
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/jquery/jquery.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/js/front.js"></script>
@yield('js_script')
<script type="application/javascript">
    var baseUrl = '{!! url('') !!}';
    $(document).ready(function(){


        $('.main-menu .nav-link').on('click',function(){
            // $('.main-menu .sub-menu').not(this).css('display','none');
            // $(this).parent('.main-menu').find('.sub-menu').show();
            $(this).addClass('active');
            if($(this).parent('.main-menu').find('.sub-menu').css('display') == 'none'){
                $('.third-level-menu').hide();
                $('.main-menu .sub-menu').not(this).css('display','none');
                $(this).parent('.main-menu').find('.sub-menu').show();


            }else{

                $(this).parent('.main-menu').find('.sub-menu').hide();
                $('.main-menu .nav-link').removeClass('active');
            }

            // if($(this).parent('.main-menu').find('.sub-menu').css('display') == 'block'){
            //     $(this).parent('.main-menu').find('.sub-menu').css('display','none');
            // }else if($(this).parent('.main-menu').find('.sub-menu').css('display') == 'none'){
            //     $(this).parent('.main-menu').find('.sub-menu').css('display','block');
            // }

        });
        $('.main-menu .sub-menu .sub-menu-btn .sub-menu-back').on('click',function(){
            $('.main-menu .sub-menu').hide();
        })

        $('.main-menu .sub-menu .nav-link').on('click',function(){
            if($(this).parent('.sub-menu li').find('.third-level-menu').css('display') == 'none'){

                $(this).parent('.sub-menu li a').addClass('active');
                $(this).parent('.sub-menu li').find('.third-level-menu').show();


            }else{
                $(this).parent('.sub-menu li').find('.third-level-menu').hide();


            }
        })
        // $(".small-menu .dropdown-submenu .sub-menu-child").hover(function(){
        //     $('.small-menu .dropdown-submenu .third-menu').css('display','block');
        // });
        //
        // $('.main-menu a').each(function (i, value) {
        //     $(this).click(function (e) {
        //
        //         $(this).closest('.main-menu .sub-menu').css('display','block');
        //     });
        // });

        // jQuery(".small-menu .dropdown-submenu").on('hover', function(event) {
        //     $(this).find('.third-menu').not(this).css('display','none');
        //     jQuery(this).addClass("child-active");
        //     $(this).next('.third-menu').css('display','block');
        //
        // });
        $('.packages-slider').owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });
        $('#team-slider').owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('#testimonial-slider').owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.product-sliders').owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
        // $('#login').on('submit', function(){
        //
        //     var url = $(this).attr('action');
        //     var form =$(this).serialize();
        //
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: form,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         dataType: 'json',
        //         success: function (response) {
        //
        //         },
        //         error: function (xhr,data) {
        //             $.each(xhr.responseJSON.errors, function (key, value) {
        //                 $('#' + key).css('border','1px solid rgb(243, 78, 15)');
        //                 $('#' + key).attr("placeholder", value);
        //
        //             });
        //         }
        //     });
        // })
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#datepicker').attr('min', maxDate);
        });
    })

</script>
</body>
</html>


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
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/css/custom.css">
    <link rel="stylesheet" href="{{asset('/frontend/css/main.css')}}">

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
                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li class="list-inline-item"><a href="{{route('register')}}">Register</a></li>
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
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input id="email-modal" type="text" placeholder="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input id="password-modal" type="password" placeholder="password" class="form-control">
                            </div>
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
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

                <ul class="navbar-nav mr-auto desktop-menu" id="menu">
                    <li class="nav-item"> <a href="{{route('home')}}" class="nav-link active">Home</a></li>
                    <li class="nav-item"> <a href="#" class="nav-link ">Appointment</a></li>
                    <li class="nav-item"> <a href="#" class="nav-link ">Packages</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Glasses</a>
                        <ul class="sub-menu">
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Men's Glasses</a></li>
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Women's Glasses</a></li>
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Children's Glasses</a></li>
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Rimless's Glasses</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Sunglasses</a>
                        <ul class="sub-menu">
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Cazal</a></li>
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Ray-ban Sunglass</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Designer</a>

                        <ul class="sub-menu">

                            <li class="nav-item">
                                <a href="#" class="nav-link">Stylish Frames
                                    <i class="fa fa-angle-right fa-2x"></i>
                                </a>

                                <ul>
                                    <li><a href='{{route('shoping-lists.index')}}'>Addidas</a>
                                    </li>
                                    <li><a href='{{route('shoping-lists.index')}}'>Cazal</a>
                                    </li>
                                    <li><a href='{{route('shoping-lists.index')}}'>Hugo galse</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('shoping-lists.index')}}">Designer Frames</a>

                            </li>
                            <li> <a href="{{route('shoping-lists.index')}}">Sunglasses</a>

                            </li>
                            <li> <a href="{{route('shoping-lists.index')}}">Contact lenses</a>

                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Lenses</a>
                        <ul class="sub-menu">
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Acuvue</a></li>
                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Copper Vision</a></li>
                        </ul>
                    </li>

                </ul>

{{--                <ul class="navbar-nav mr-auto mobile-menu" id="menu">--}}
{{--                    <li class="nav-item"> <a href="#" class="nav-link active">Home</a></li>--}}
{{--                    <li class="nav-item"> <a href="#" class="nav-link ">Packages</a></li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link">Glasses</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Men's Glasses</a></li>--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Women's Glasses</a></li>--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Children's Glasses</a></li>--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Rimless's Glasses</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link">Sunglasses</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Cazal</a></li>--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Ray-ban Sunglass</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Designer</a>--}}

{{--                        <ul class="sub-menu">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('shoping-lists.index')}}" class="nav-link">Stylish Frames--}}
{{--                                    <i class="fa fa-angle-right fa-2x"></i>--}}
{{--                                </a>--}}

{{--                                <ul>--}}
{{--                                    <li><a href='{{route('shoping-lists.index')}}'>Addidas</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href='{{route('shoping-lists.index')}}'>Cazal</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href='{{route('shoping-lists.index')}}'>Hugo galse</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('shoping-lists.index')}}">Designer Frames</a>--}}

{{--                            </li>--}}
{{--                            <li> <a href="{{route('shoping-lists.index')}}">Sunglasses</a>--}}

{{--                            </li>--}}
{{--                            <li> <a href="{{route('shoping-lists.index')}}">Contact lenses</a>--}}

{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Lenses</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Acuvue</a></li>--}}
{{--                            <li class="nav-item"><a href="{{route('shoping-lists.index')}}" class="nav-link">Copper Vision</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                </ul>--}}

                <div class="navbar-buttons d-flex justify-content-end">
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>3 items in cart</span></a></div>
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
                <ul class="list-unstyled">
                    <li><a href="text.html">About us</a></li>
                    <li><a href="text.html">Terms and conditions</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
                <hr>
                <h4 class="mb-3">User section</h4>
                <ul class="list-unstyled">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    <li><a href="register.html">Regiter</a></li>
                </ul>
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Top categories</h4>
                <h5>Men</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Shirts</a></li>
                    <li><a href="category.html">Accessories</a></li>
                </ul>
                <h5>Ladies</h5>
                <ul class="list-unstyled">
                    <li><a href="category.html">T-shirts</a></li>
                    <li><a href="category.html">Skirts</a></li>
                    <li><a href="category.html">Pants</a></li>
                    <li><a href="category.html">Accessories</a></li>
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
    $(document).ready(function(){

        // $(".small-menu .dropdown-submenu .sub-menu-child").hover(function(){
        //     $('.small-menu .dropdown-submenu .third-menu').css('display','block');
        // });
        //
        // $('.small-menu .dropdown-submenu a').each(function (i, value) {
        //     $(this).hover(function (e) {
        //         $(this).find('.third-menu').not(this).css('display','none');
        //         $(this).next('.third-menu').css('display','block');
        //     }, function () {
        //         $(this).next('.third-menu').css('display','none');
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
                    items: 4
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

        $('.product-slider').owlCarousel({
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
    })

</script>
</body>
</html>

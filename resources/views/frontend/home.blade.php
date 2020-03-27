@extends('frontend.app')
@section('title','Home')
@section('css_script')
@endsection
@section('content')
<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        @foreach($banners as $banner)
                        <div class="item">
                            <div class="banner-wrapper">
                                <img src="{{asset('storage/'.$banner->image)}}" alt="{{$banner->title}}" class="img-fluid">
                                <div class="banner-content">
                                    <div class="banner-content-wrapper">
                                        <h2>{{$banner->title}}</h2>
                                        <p>
                                            {{str_limit($banner->short_description,'200','....')}}
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /#main-slider-->
                </div>
            </div>
        </div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
        <div id="advantages">
            <div class="box py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-0">Services</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mb-4">
                    @foreach($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                            <div class="icon">
                                <img style="width:80px; height: 80px;opacity:0.5" src="{{asset('storage/'.$service->image)}}" alt="{{$service->title}}">
                            </div>
                            <h3><a href="{{route('service.show',[$service->slug])}}" style="color: #000; font-weight:500">{{$service->title}}</a></h3>
                            <p class="mt-4 mb-0">{{str_limit($service->short_description,'100','....')}}</p>
                            <a href="{{route('service.show',[$service->slug])}}">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- /.row-->
            </div>
            <!-- /.container-->
        </div>
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id="hot">
            <div class="box py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-0">Packages</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="packages-slider owl-carousel owl-theme">
                    @foreach($packages as $package)
                    <div class="item">
                        <div class = "media">
                            <a class ="pull-left" href = "{{route('package.show',[$package->slug])}}">
                                <img style="width:100px;height:100px" class="media-object" src ="{{asset('storage/'.$package->image)}}" alt = "{{$package->title}}">
                            </a>

                            <div class="media-body" style="padding:0px 15px;">
                                <h4 class = "media-heading">{{str_limit($package->title,'20','....')}}</h4>
                                <p style="font-weight: 300;text-align:left;">
                                    {{str_limit($package->short_description,'100','.....')}}
                                </p>
                                <a href="{{route('package.show',[$package->slug])}}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /.product-slider-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>

        <div id="hot">
            <div class="box py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-0">New Arrival</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="product-slider owl-carousel owl-theme">
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">Fur coat with very but very very long name</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">White Blouse Armani</a></h3>
                                <p class="price">
                                    <del>$280</del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">Black Blouse Versace</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">Black Blouse Versace</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">White Blouse Versace</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product1.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">Fur coat</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product2.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">White Blouse Armani</a></h3>
                                <p class="price">
                                    <del>$280</del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{route('shoping-lists.single-page')}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{route('shoping-lists.single-page')}}" class="invisible"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/product3.jpg" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{route('shoping-lists.single-page')}}">Black Blouse Versace</a></h3>
                                <p class="price">
                                    <del></del>$143.00
                                </p>
                            </div>
                            <!-- /.text-->
                        </div>
                        <!-- /.product-->
                    </div>
                    <!-- /.product-slider-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->

        <div class="appointment" style="background-image: url('{{asset('frontend/img/eye1.jpg')}}')">
            <h2>Contact us</h2>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="appointment-wrapper" >
                            <div class="appointment-cover">
                                <p>
                                    If you have any problem related to eye than please  free to contact us
                                </p>
                                <span>
                                    <ul class="appointment-contact-info">
                                        @foreach($settings as $setting)
                                            @if($setting->slug == 'email')
                                        <li><i class="fa fa-envelope-o fa-2x"></i>{{$setting->value}}</li>
                                            @endif
                                                @if($setting->slug == 'address')
                                                <li><i class="fa fa-map-marker fa-2x"></i>{{$setting->value}}</li>
                                                @endif
                                                    @if($setting->slug == 'phone')
                                                <li><i class="fa fa-phone fa-2x"></i>{{$setting->value}}</li>
                                                @endif

                                                    @if($setting->slug == 'opening-hours')
                                                    <li>Opening Hours:<br>{{$setting->value}}</li>
                                                    @endif
                                                @if($setting->slug == 'company-regd-no')
                                                    <li>Company Regd. No:{{$setting->value}}</li>
                                                @endif
                                            @endforeach


                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <div class="appointment-wrapper">
                            <div class="appointment-cover">
                                <p>
                                    Appointment is for those patient who are new and want to consultant with the refree doctors
                                </p>
                                <a href="" class="btn appointment-btn">Make Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *** GET INSPIRED END ***-->
        <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->

        <div class="box text-center">
            <div class="container">
                <div class="col-md-12">
                    <h3 class="text-uppercase">Meet Our Doctors</h3>

                </div>
            </div>
        </div>
        <div class="container">

            <div id="team-slider" class="owl-carousel owl-theme">

                @foreach($doctors as  $doctor)
                <div class="item">


                    <div class="cover" style="margin-right: 20px;">
                        <a href="#">
                            @if(file_exists('storage/'.$doctor->image) && $doctor->image != '')
                            <img style="width:100%; height:200px;" class="img-responsive" src="{{asset('storage/'.$doctor->image)}}" alt="{{$doctor->name}}">
                            @endif
                        </a>
                        <div class="details">
                            <ul class="team-social-link">
                                <li>
                                    @if(!empty($doctor->facebook))
                                    <a href="{{$doctor->facebook}}"><i class="fa fa-facebook"></i></a>
                                        @endif
                                </li>
                                <li>
                                    @if(!empty($doctor->twitter))
                                    <a href="{{$doctor->twitter}}"><i class="fa fa-twitter"></i></a>
                                        @endif
                                </li>
                                <li>
                                    @if(!empty($doctor->linkedin))
                                    <a href="{{$doctor->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                        @endif
                                </li>
                            </ul>
                        </div>
                        <div class="team-details">
                            <h3>{{$doctor->name}}</h3>
                            <p>{{$doctor->specalists}}</p>
                        </div>
                    </div>

                </div>

                @endforeach

            </div>

        </div>
        <div class="box text-center">
            <div class="container">
                <div class="col-md-12">
                    <h3 class="text-uppercase">Blog</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div id="blog-homepage" class="row">
                    @foreach($blogs as $blog)
                    <div class="col-sm-6">
                        <div class="post">
                            <h4><a href="{{route('blog.show',[$blog->slug])}}">{{$blog->title}}</a></h4>
                            <p class="author-category">By <a href="{{route('blog.show',[$blog->slug])}}">{{$blog->author->name}}</a> Category <a href="{{route('blog.show',[$blog->slug])}}">{{$blog->category->name}}</a></p>
                            <hr>
                            <p class="intro">
                                {{ str_limit($blog->short_description,'200','....') }}
                            </p>
                            <p class="read-more"><a href="{{route('blog.show',[$blog->slug])}}" class="btn btn-primary">Continue reading</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /#blog-homepage-->
            </div>
        </div>
        <!-- /.container-->
        <!-- *** BLOG HOMEPAGE END ***-->
    </div>
    <div class="box text-center">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-uppercase">Testimonial</h3>
                <p class="lead mb-0">What coustomer tells about our service</p>
            </div>
        </div>
    </div>
    <div class="testimonial-slider">
        <div class="container">
            <div id="testimonial-slider" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <div class="testimonial-wrapper">
                            <div class="testimonial-img">
                                <img src="{{asset('frontend/img/eye.jpeg')}}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <span>Ramesh karki</span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eos exercitationem facere incidunt inventore neque nihil repellat ullam voluptatum! Ab commodi, eligendi expedita explicabo illo ipsa ipsum maiores odio qui.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- /.container-->
    <!-- *** BLOG HOMEPAGE END ***-->
</div>
@endsection
@section('js_script')
@endsection

@extends('frontend.app')
@section('title','Home')
@section('css_script')
@endsection
@section('content')
<div id="all">
    <div id="content">
        {{--<div class="container">--}}
            <div class="row">
                <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        @foreach($banners as $banner)
                        <div class="item">
                            <div class="banner-wrapper">
                                <img src="{{asset('storage/'.$banner->image)}}" alt="{{$banner->title}}" class="img-fluid">
                                <div class="banner-content">
                                    {{--<div class="banner-content-wrapper">--}}
                                        {{--<h2>{{$banner->title}}</h2>--}}
                                        {{--<p>--}}
                                            {{--{{str_limit($banner->short_description,'200','....')}}--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                </div>


                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /#main-slider-->
                </div>
            </div>
        {{--</div>--}}
    </div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
            <div id="home-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="home-wrapper">
                                <div class="home-image">

                                    @if(!empty($home->slug))
                                        @if(file_exists('storage/'.$home->image) && $home->image != '')
                                            <img src="{{asset('storage/'.$home->image)}}" alt="{{$home->title}}">
                                        @endif
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="home-wrapper">
                                <div class="home-wrapper-content">
                                    <div class="title">
                                        <h1>John Lewis Opticians</h1>
                                    </div>

                                    <div class="home-paragraph">
                                      <p>  {!! $home->description !!}
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        {{--<div id="advantages">--}}
            {{--<div class="box py-4">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<h2 class="mb-0">Services</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container">--}}
                {{--<div class="row mb-4">--}}
                    {{--@foreach($services as $service)--}}
                    {{--<div class="col-md-4 mb-4">--}}
                        {{--<div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">--}}
                            {{--<div class="icon">--}}
                                {{--<img style="width:80px; height: 80px;opacity:0.5" src="{{asset('storage/'.$service->image)}}" alt="{{$service->title}}">--}}
                            {{--</div>--}}
                            {{--<h3><a href="{{route('service.show',[$service->slug])}}" style="color: #000; font-weight:500">{{$service->title}}</a></h3>--}}
                            {{--<p class="mt-4 mb-0">{{str_limit($service->short_description,'100','....')}}</p>--}}
                            {{--<a href="{{route('service.show',[$service->slug])}}">Read More</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}

                {{--<!-- /.row-->--}}
            {{--</div>--}}
            {{--<!-- /.container-->--}}
        {{--</div>--}}
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->

        <div id="hot">
            {{--<div class="box py-4">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<h2 class="mb-0">More Info connected to EYECARE</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="container">
                <div class="contact-lens pb-5 pt-5">
                    <div class="row">
                        @if(!empty($about->slug))

                        <div class="col-lg-6">
                            <div class="contact-lens-content">
                                <h2 class="heading-title">{{$about->title}}</h2>
                                <div class="contact-lens-content-wrapper">
                                    {!! $about->short_description !!}
                                </div>

                            </div>

                            <div class="contact-lens-btn">
                                <a href="{{route('content.show',['about-us'])}}" class="btn btn-about-us">
                                    More Info
                                </a>
                            </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="contact-lens-image-wrapper">
                                    @if(file_exists('storage/'.$about->image) && $about->image != '')
                                        <img src="{{asset('storage/'.$about->image)}}" alt="{{$about->title}}">
                                    @endif

                                </div>
                            </div>
                    </div>

                    @endif
                </div>
                <hr>
                <div class="contact-lens pb-5 pt-5">
                    <div class="row">
                        @if(!empty($eyecare->slug))

                            <div class="col-lg-6">
                                <div class="contact-lens-image-wrapper">
                                    @if(file_exists('storage/'.$eyecare->image) && $eyecare->image != '')
                                        <img src="{{asset('storage/'.$eyecare->image)}}" alt="{{$eyecare->title}}">
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-lens-content">
                                    <h2 class="heading-title">{{$eyecare->title}}</h2>
                                    <div class="contact-lens-content-wrapper">
                                        {!! $eyecare->short_description !!}
                                    </div>

                                </div>

                                <div class="contact-lens-btn">
                                    <a href="{{route('content.show',['eye-care'])}}" class="btn btn-about-us">
                                        More Info
                                    </a>
                                </div>
                            </div>
                    </div>

                    @endif
                </div>

                    <hr>
                <div class="contact-lens pb-5 pt-5">
                    <div class="row">
                        @if(!empty($contactlens->slug))


                            <div class="col-lg-6">
                                <div class="contact-lens-content">
                                    <h2 class="heading-title">{{$contactlens->title}}</h2>
                                    <div class="contact-lens-content-wrapper">
                                        {!! $contactlens->short_description !!}
                                    </div>

                                </div>

                                <div class="contact-lens-btn">
                                    <a href="{{route('content.show',['contact-lens'])}}" class="btn btn-about-us">
                                        More Info
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-lens-image-wrapper">
                                    @if(file_exists('storage/'.$contactlens->image) && $contactlens->image != '')
                                        <img src="{{asset('storage/'.$contactlens->image)}}" alt="{{$contactlens->title}}">
                                    @endif

                                </div>
                            </div>
                    </div>

                    @endif
                </div>
                <hr>
                <div class="contact-lens pb-5 pt-5">
                    <div class="row">
                        @if(!empty($frame->slug))


                            <div class="col-lg-6">
                                <div class="contact-lens-image-wrapper">
                                    @if(file_exists('storage/'.$frame->image) && $frame->image != '')
                                        <img src="{{asset('storage/'.$frame->image)}}" alt="{{$frame->title}}">
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-lens-content">
                                    <h2 class="heading-title">{{$frame->title}}</h2>
                                    <div class="contact-lens-content-wrapper">
                                        {!! $frame->short_description !!}
                                    </div>

                                </div>

                                <div class="contact-lens-btn">
                                    <a href="{{route('frame-brands')}}" class="btn btn-about-us">
                                        More Info
                                    </a>
                                </div>
                            </div>
                    </div>

                    @endif
                </div>


                {{--<div class="packages-slider owl-carousel owl-theme">--}}
                    {{--@foreach($packages as $package)--}}
                    {{--<div class="item">--}}
                        {{--<div class = "media">--}}
                            {{--<a class ="pull-left" href = "{{route('package.show',[$package->slug])}}">--}}
                                {{--<img style="width:100px;height:100px" class="media-object" src ="{{asset('storage/'.$package->image)}}" alt = "{{$package->title}}">--}}
                            {{--</a>--}}

                            {{--<div class="media-body" style="padding:0px 15px;">--}}
                                {{--<h4 class = "media-heading">{{str_limit($package->title,'20','....')}}</h4>--}}
                                {{--<p style="font-weight: 300;text-align:left;">--}}
                                    {{--{{str_limit($package->short_description,'100','.....')}}--}}
                                {{--</p>--}}
                                {{--<a href="{{route('package.show',[$package->slug])}}">Read More</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<!-- /.product-slider-->--}}
                {{--</div>--}}
                {{--<!-- /.container-->--}}
            </div>
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>

    <div class="new-subscribe">
        <div class="container">
            <div class="subscribe-form">

                <h3>Subscribe</h3>
                <p>Sign up to get on sales,new release and more.</p>
                <div  id="message-success">
                    <span></span>
                </div>
                    {!! Form::open(['route'=>'email-subscribe.store','method'=>'post','id'=>'email-subscribe']) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <lable>First Name</lable>
                                <input type="text" name="firstname" class="form-control" placeholder="Full Name" id="firstname">
                            </div>
                            <div class="col-lg-6">
                                <lable>Last Name</lable>
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" id="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8">
                                <lable>Email</lable>
                                <input type="Email" name="email" class="form-control" placeholder="Enter your email address" id="email">
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-submit">SIGN UP</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--<div class="sales-now">--}}
        {{--<div class="container">--}}
            {{--<div class="sales-lists">--}}

                {{--<h3>Sales</h3>--}}

                {{--<div class="row products">--}}

                    {{--@foreach($products as $product)--}}
                        {{--<div class="col-lg-3 col-md-4">--}}
                            {{--<div class="product-single-item">--}}
                                {{--<a href="{{route('product.show',[$product->slug ])}}" class="shop-lists">--}}
                                    {{--<img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">--}}

                                    {{--<p><span class="model text-left">Mod: {{$product->shape}}</span>--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                        {{--<span class="brand">Brand:{{$product->brand->name}}</span></p>--}}

                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<!-- /.product            -->--}}
                        {{--</div>--}}
                {{--@endforeach--}}

                {{--<!-- /.products-->--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
<div class="appointment-section">
    <div class="container">
        <div class="appointment-section-wrapper">

            @if(Auth::check())
                <a href="{{route('appointment.index')}}">Book An Appointment</a>

            @else
                <a href="javascript:void(0)" class="appointment-btn-modal" data-type="{{route('appointment.index')}}">Book An Appointment</a>

            @endif
        </div>
    </div>
</div>

    {{--<div id="map">--}}
        {{--<div class="google-map" style="background-image: url('{{asset('frontend/img/google.png')}}')">--}}
            {{--<div class="container">--}}
                {{--<div class="googl-map-inner" >--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.2153447680557!2d0.06920631530132262!3d51.49091561973007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a8c1ceb86f69%3A0x5f31c5de7325f729!2sJohn%20Lewis%20Opticians!5e0!3m2!1sen!2snp!4v1592116587032!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0; margin-top: 20px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        {{--<div id="hot">--}}
            {{--<div class="box py-4">--}}
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<h2 class="mb-0">New Arrival</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container">--}}
                {{--<div class="product-sliders owl-carousel owl-theme">--}}
                    {{--@foreach($products as $product)--}}
                    {{--<div class="item">--}}
                        {{--<div class="product">--}}
                            {{--<div class="flip-container">--}}
                                {{--<div class="flipper">--}}
                                    {{--<div class="front"><a href="{{route('product.show',[$product->slug])}}"><img style="height: 250px;" src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}" class="img-fluid"></a></div>--}}
                                    {{--<div class="back"><a href="{{route('product.show',[$product->slug])}}"><img style="height: 250px;" src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}" class="img-fluid"></a></div>--}}
                                {{--</div>--}}
                            {{--</div><a href="{{route('product.show',[$product->slug])}}" class="invisible"><img style="height: 250px;" src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}" class="img-fluid"></a>--}}
                            {{--<div class="text column">--}}
                                {{--<h3><a href="{{route('product.show',[$product->slug])}}">{{$product->title}}</a></h3>--}}
                                {{--@if(!empty($product->discount_id))--}}
                                    {{--<p class="price">--}}
                                        {{--<strike>£{{$product->price}}</strike><br>--}}
                                        {{--@php $discount = $product->price - ($product->price * ($product->discount->percentage / 100))@endphp--}}
                                        {{--£ &nbsp;{{ $discount}}--}}
                                    {{--</p>--}}
                                    {{--@else--}}
                                {{--<p class="price">--}}
                                    {{--<del></del>£&nbsp;{{$product->price}}--}}
                                {{--</p>--}}
                                    {{--@endif--}}

                            {{--</div>--}}
                            {{--<!-- /.text-->--}}
                            {{--@if(!empty($product->discount_id))--}}
                            {{--<div class="ribbon sale discount-tage">--}}
                                {{--<div class="theribbon" style="width: 162px;">off {{$product->discount->percentage}}%</div>--}}
                                {{--<div class="ribbon-background"></div>--}}
                            {{--</div>--}}
                            {{--@endif--}}
{{--                            <!-- /.ribbon-->--}}
                            {{--<div class="ribbon new">--}}
                                {{--<div class="theribbon" style="width: 162px; background: red; margin-top: 20px;">--}}
                                    {{--@if(!empty($product->sunglass_id))--}}
                                    {{--{{$product->brand->name}}--}}
                                        {{--@endif--}}
                                {{--</div>--}}
                                {{--<div class="ribbon-background"></div>--}}
                            {{--</div>--}}
                            {{--<!-- /.ribbon-->--}}
                            {{--<div class="ribbon gift">--}}
                                {{--<div class="theribbon">New</div>--}}
                                {{--<div class="ribbon-background"></div>--}}
                            {{--</div>--}}
                            {{--<!-- /.ribbon-->--}}
                        {{--</div>--}}
                        {{--<!-- /.product-->--}}
                    {{--</div>--}}
                    {{--@endforeach--}}

                    {{--<!-- /.product-slider-->--}}
                {{--</div>--}}
                {{--<!-- /.container-->--}}
            {{--</div>--}}
            {{--<!-- /#hot-->--}}
            {{--<!-- *** HOT END ***-->--}}
        {{--</div>--}}
        {{--<!----}}
        {{--*** GET INSPIRED ***--}}
        {{--_________________________________________________________--}}
        {{---->--}}

        {{--<div class="appointment" style="background-image: url('{{asset('frontend/img/eye1.jpg')}}')">--}}
            {{--<h2>Contact us</h2>--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xs-12 col-md-6 col-lg-6">--}}
                        {{--<div class="appointment-wrapper" >--}}
                            {{--<div class="appointment-cover">--}}
                                {{--<p>--}}
                                    {{--If you have any problem related to eye than please  free to contact us--}}
                                {{--</p>--}}
                                {{--<span>--}}
                                    {{--<ul class="appointment-contact-info">--}}
                                        {{--@foreach($settings as $setting)--}}
                                            {{--@if($setting->slug == 'email')--}}
                                        {{--<li><i class="fa fa-envelope-o fa-2x"></i>{{$setting->value}}</li>--}}
                                            {{--@endif--}}
                                                {{--@if($setting->slug == 'address')--}}
                                                {{--<li><i class="fa fa-map-marker fa-2x"></i>{{$setting->value}}</li>--}}
                                                {{--@endif--}}
                                                    {{--@if($setting->slug == 'phone')--}}
                                                {{--<li><i class="fa fa-phone fa-2x"></i>{{$setting->value}}</li>--}}
                                                {{--@endif--}}

                                                    {{--@if($setting->slug == 'opening-hours')--}}
                                                    {{--<li>Opening Hours:<br>{{$setting->value}}</li>--}}
                                                    {{--@endif--}}
                                                {{--@if($setting->slug == 'company-regd-no')--}}
                                                    {{--<li>Company Regd. No:{{$setting->value}}</li>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}


                                    {{--</ul>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xs-12 col-md-6 col-lg-6">--}}
                        {{--<div class="appointment-wrapper">--}}
                            {{--<div class="appointment-cover">--}}
                                {{--<p>--}}
                                    {{--Appointment is for those patient who are new and want to consultant with the refree doctors--}}
                                {{--</p>--}}
                                {{--<a href="" class="btn appointment-btn">Make Appointment</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- *** GET INSPIRED END ***-->--}}
        {{--<!----}}
        {{--*** BLOG HOMEPAGE ***--}}
        {{--_________________________________________________________--}}
        {{--{{-frame--}}{{--<div class="box text-center">--}}
            {{--<div class="container">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h3 class="text-uppercase">Meet Our Doctors</h3>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="container">--}}

            {{--<div id="team-slider" class="owl-carousel owl-theme">--}}

                {{--@foreach($doctors as  $doctor)--}}
                {{--<div class="item">--}}


                    {{--<div class="cover" style="margin-right: 20px;">--}}
                        {{--<a href="#">--}}
                            {{--@if(file_exists('storage/'.$doctor->image) && $doctor->image != '')--}}
                            {{--<img style="width:100%; height:200px;" class="img-responsive" src="{{asset('storage/'.$doctor->image)}}" alt="{{$doctor->name}}">--}}
                            {{--@endif--}}
                        {{--</a>--}}
                        {{--<div class="details">--}}
                            {{--<ul class="team-social-link">--}}
                                {{--<li>--}}
                                    {{--@if(!empty($doctor->facebook))--}}
                                    {{--<a href="{{$doctor->facebook}}"><i class="fa fa-facebook"></i></a>--}}
                                        {{--@endif--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--@if(!empty($doctor->twitter))--}}
                                    {{--<a href="{{$doctor->twitter}}"><i class="fa fa-twitter"></i></a>--}}
                                        {{--@endif--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--@if(!empty($doctor->linkedin))--}}
                                    {{--<a href="{{$doctor->linkedin}}"><i class="fa fa-linkedin"></i></a>--}}
                                        {{--@endif--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="team-details">--}}
                            {{--<h3>{{$doctor->name}}</h3>--}}
                            {{--<p>{{$doctor->specalists}}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--@endforeach--}}

            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="box text-center">--}}
            {{--<div class="container">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h3 class="text-uppercase">Blog</h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-12">--}}
                {{--<div id="blog-homepage" class="row">--}}
                    {{--@foreach($blogs as $blog)--}}
                    {{--<div class="col-sm-6">--}}
                        {{--<div class="post">--}}
                            {{--<h4><a href="{{route('blog.show',[$blog->slug])}}">{{$blog->title}}</a></h4>--}}
                            {{--<p class="author-category">By <a href="{{route('blog.show',[$blog->slug])}}">{{$blog->author->name}}</a> Category <a href="{{route('blog.show',[$blog->slug])}}">{{$blog->category->name}}</a></p>--}}
                            {{--<hr>--}}
                            {{--<p class="intro">--}}
                                {{--{{ str_limit($blog->short_description,'200','....') }}--}}
                            {{--</p>--}}
                            {{--<p class="read-more"><a href="{{route('blog.show',[$blog->slug])}}" class="btn btn-primary">Continue reading</a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<!-- /#blog-homepage-->--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.container-->--}}
        {{--<!-- *** BLOG HOMEPAGE END ***-->--}}
    {{--</div>--}}
    {{--<div class="box text-center">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-12">--}}
                {{--<h3 class="text-uppercase">Testimonial</h3>--}}
                {{--<p class="lead mb-0">What coustomer tells about our service</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="testimonial-slider">--}}
        {{--<div class="container">--}}
            {{--<div id="testimonial-slider" class="owl-carousel owl-theme">--}}
                {{--@foreach($testimonials as $testimonial)--}}
                {{--<div class="item">--}}
                    {{--<div class="testimonial">--}}
                        {{--<div class="testimonial-wrapper">--}}
                            {{--<div class="testimonial-img">--}}
                                {{--@if(file_exists('storage/'.$testimonial->author->image) && $testimonial->author->image != '')--}}
                                    {{--<img  src="{{asset('storage/'.$testimonial->author->image)}}" alt="{{$testimonial->author->name}}">--}}
                                {{--@else--}}
                                    {{--<img  src="https://via.placeholder.com/300" alt="{{$testimonial->author->name}}">--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            {{--<div class="testimonial-content">--}}
                                {{--<span>{{$testimonial->author->name}}</span>--}}
                                {{--<p>--}}
                                    {{--{{ str_limit($testimonial->description,'300','....') }}--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
               {{--@endforeach--}}


            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- /.container-->
    <!-- *** BLOG HOMEPAGE END ***-->
</div>
@endsection
@section('js_script')
    <script type="text/javascript" >
        jQuery(document).ready(function(){
            $('#email-subscribe').on('submit',function(){
                event.preventDefault();

                var url = '{{route('email-subscribe.store')}}'
                var data = $( this ).serialize();
                $.ajax({
                    type:'POST',
                    url:url,headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data:data,
                    dataType: 'json',
                    success:function(data){
                        console.log(data.message)
                        $('#email-subscribe')[0].reset();
                        setTimeout(function(){
                            $('#message-success').addClass('alert alert-success');
                            $('#message-success span').text(data.message);

                        }, 5000);

                    },
                    error: function (xhr,data) {
                        console.log(xhr);
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key).css('border','1px solid rgb(243, 78, 15)');
                            $('#' + key).attr("placeholder", value);

                        });
                    }
                })

            })
        });
    </script>
@endsection

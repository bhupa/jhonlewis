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
                                    <img src="{{asset('frontend/img/home.jpeg')}}" alt="">
                                    
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
                                        <p>
                                            Established in 1986,  Welcome to John Lewis Opticians Woolwich, an Independent Opticians, Contact Lens Specialists and Dispensing Opticians at Woolwich, London SE18 7BZ

                                        </p>
                                        <p>
                                            John Lewis Opticians Woolwich  has built a strong reputation for providing the highest standard of optical care and services, including sight tests, contact lens fittings, spectacles, sunglasses and prescription sunglasses.

                                        </p>
                                    </div>

                                    <a href="" class="btn btn-about-us">
                                        About Us
                                    </a>
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
                <div class="contact-lens pt-5">
                    <div class="contact-lens-image-wrapper">
                        <img src="{{asset('frontend/img/contact-lens.png')}}" alt="eye-care">
                        <h2 class="heading-title">Eye care</h2>
                    </div>
                    <div class="contact-lens-content">
                        <div class="contact-lens-content-wrapper">
                            <p>
                                Whether you are looking for a more practical solution when playing sports, going out, travelling or are simply after a new look, contact lenses are a great choice for many people

                                Being one of the largest contact lens suppliers in London, we have access to all the major brands and are able to offer trial fittings of the latest designs as soon as they are available. We can deliver your contact lenses directly to you same day or deliver it to you via post if you can not come into practice

                            </p>
                        </div>

                    </div>

                    <div class="contact-lens-btn">
                        <a href="" class="btn btn-about-us">
                          More Info
                        </a>
                    </div>
                </div>
                    <hr>
                <div class="contact-lens pt-5">
                    <div class="contact-lens-image-wrapper">
                        <img src="{{asset('frontend/img/contact-lens.png')}}" alt="eye-care">
                        <h2 class="heading-title">contact lens
                        </h2>
                    </div>
                    <div class="contact-lens-content">
                        <div class="contact-lens-content-wrapper">
                            <p>
                                Whether you are looking for a more practical solution when playing sports, going out, travelling or are simply after a new look, contact lenses are a great choice for many people

                                Being one of the largest contact lens suppliers in London, we have access to all the major brands and are able to offer trial fittings of the latest designs as soon as they are available. We can deliver your contact lenses directly to you same day or deliver it to you via post if you can not come into practice

                            </p>
                        </div>

                    </div>

                    <div class="contact-lens-btn">
                        <a href="" class="btn btn-about-us">
                            More Info
                        </a>
                    </div>
                </div>
                <div class="contact-lens pt-5">
                    <div class="contact-lens-image-wrapper">
                        <img src="{{asset('frontend/img/brand.png')}}" alt="eye-care">
                        <h2 class="heading-title">Frame & Brand
                        </h2>
                    </div>
                    <div class="contact-lens-content">
                        <div class="contact-lens-content-wrapper">
                            <p>
                                Whether you are looking for a more practical solution when playing sports, going out, travelling or are simply after a new look, contact lenses are a great choice for many people

                                Being one of the largest contact lens suppliers in London, we have access to all the major brands and are able to offer trial fittings of the latest designs as soon as they are available. We can deliver your contact lenses directly to you same day or deliver it to you via post if you can not come into practice

                            </p>
                        </div>

                    </div>

                    <div class="contact-lens-btn">
                        <a href="" class="btn btn-about-us">
                            More Info
                        </a>
                    </div>
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
                <form action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <lable>First Name</lable>
                                <input type="text" class="form-control" placeholder="Full Name" id="fullname">
                            </div>
                            <div class="col-lg-6">
                                <lable>Last Name</lable>
                                <input type="text" class="form-control" placeholder="Last Name" id="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8">
                                <lable>Email</lable>
                                <input type="Email" class="form-control" placeholder="Enter your email address" id="email">
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-submit">SING UP</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2423689.3111280794!2d-4.2326794027687615!3d53.61337019363916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sjohn%20lewis%20opticians%20google%20map!5e0!3m2!1sen!2snp!4v1585282550402!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
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
        {{---->--}}

        {{--<div class="box text-center">--}}
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
@endsection

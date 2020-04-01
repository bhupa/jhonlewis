@extends('frontend.app')
@section('title','Contact Us')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
                        *** PAGES MENU ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Pages</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li><a href="text.html" class="nav-link">Text page</a></li>
                                    <li><a href="contact.html" class="nav-link">Contact page</a></li>
                                    <li><a href="faq.html" class="nav-link">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- *** PAGES MENU END ***-->
                        <div class="banner"><a href="#"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
                    </div>
                    <div class="col-lg-9">
                        <div id="contact" class="box">
                            <h1>Contact</h1>
                            <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                            <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
                            <hr>
                            <div class="row">

                                <div class="col-md-4">
                                    <h3><i class="fa fa-map-marker"></i>Address</h3>
{{--                                    <p>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>--}}
                                    @foreach($settings as $setting)
                                    @if($setting->slug == 'address')
                                    <p>{{$setting->value}}</p>
                                        @endif
                                        @endforeach
                                </div>
                                <!-- /.col-sm-4-->
                                <div class="col-md-4">
                                    <h3><i class="fa fa-phone"></i> Call center</h3>
                                    <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                                    @foreach($settings as $setting)
                                    @if($setting->slug == 'phone')
                                    <p><strong>{{$setting->value}}</strong></p>
                                        @endif
                                        @endforeach
                                </div>
                                <!-- /.col-sm-4-->
                                <div class="col-md-4">
                                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                    <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                                    <ul>
                                        @foreach($settings as $setting)
                                        @if($setting->slug == 'email')
                                        <li><strong><a href="mailto:">{{$setting->value}}</a></strong></li>
                                        @endif
                                        @endforeach
                                        <li><strong><a href="{{route('appointment.index')}}">Appointment</a></strong> - You Can Appointment For Chekup</li>
                                    </ul>
                                </div>

                                <!-- /.col-sm-4-->
                            </div>
                            <!-- /.row-->
                            <hr>
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2423689.3111280794!2d-4.2326794027687615!3d53.61337019363916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sjohn%20lewis%20opticians%20google%20map!5e0!3m2!1sen!2snp!4v1585282550402!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                            <hr>
                            <h2>Contact form</h2>
                          {!! Form::open(['route'=>'contact-us.store','method'=>'post']) !!}
                            @if (\Session::has('success'))
                                <div class="alert alert-success">

                                    <span>{!! \Session::get('success') !!}</span>

                                </div>

                            @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input id="firstname" name="firstname" type="text" class="form-control">
                                            @if ($errors->has('firstname'))
                                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input id="lastname" name="lastname" type="text" class="form-control">
                                            @if ($errors->has('lastname'))
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" name="email" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input id="subject" name="subject" type="text" class="form-control">
                                            @if ($errors->has('subject'))
                                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" name="message" class="form-control"></textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
                                    </div>
                                </div>
                                <!-- /.row-->
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.col-md-9-->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

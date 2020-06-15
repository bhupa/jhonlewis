@extends('frontend.app')
@section('title','Contact Us')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    {{--<div class="col-lg-12">--}}
                        {{--<!-- breadcrumb-->--}}
                        {{--<nav aria-label="breadcrumb">--}}
                            {{--<ol class="breadcrumb">--}}
                                {{--<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
                                {{--<li aria-current="page" class="breadcrumb-item active">Contact</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                       {{--@include('product.lists')--}}
                    {{--</div>--}}
                    <div class="col-lg-12">
                        <div id="contact" class="box" style="margin-top: 50px;">
                            <h1>Contact</h1>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2>Contact Form</h2>
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
                                        <div class="col-md-12 text-left">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    {!! Form::close() !!}
                                </div>

                                <div class="col-lg-6 ">
                                    <div class="contact-page-right">
                                        <div class="col-md-12">

                                            {{--                                    <p>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>--}}
                                            @foreach($settings as $setting)
                                                @if($setting->slug == 'address')
                                                    <h3><i class="fa fa-map-marker" style="margin-right: 10px"></i>{{$setting->value}}</h3>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- /.col-sm-4-->
                                        <div class="col-md-12">

                                            <p class="text-muted"></p>
                                            @foreach($settings as $setting)
                                                @if($setting->slug == 'phone')
                                                    {{--<p><strong>{{$setting->value}}</strong></p>--}}
                                                    <h3><i class="fa fa-phone" style="margin-right: 10px"></i>{{$setting->value}}</h3>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- /.col-sm-4-->

                                        <div class="col-md-12">
                                            {{--<h3><i class="fa fa-envelope" style="margin-right: 10px"></i> support</h3>--}}
                                            <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                                            <ul>
                                                @foreach($settings as $setting)
                                                    @if($setting->slug == 'email')
                                                        <li><strong><a href="mailto:">{{$setting->value}}</a></strong></li>
                                                    @endif
                                                @endforeach
                                                <li><strong><a href="{{route('appointment.index')}}">Appointment</a></strong> - You Can Appointment For Checkup</li>
                                            </ul>
                                        </div>
                                        <hr>
                                    </div>

                                    {{--<div id="map">--}}
                                        {{--<div class="google-map" style="background-image: url('{{asset('frontend/img/google.png')}}');height: 400px">--}}
                                            {{--<div class="container">--}}
                                                {{--<div class="googl-map-inner" >--}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <!-- /.col-sm-4-->
                            </div>


                            <!-- /.row-->

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.2153447680557!2d0.06920631530132262!3d51.49091561973007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a8c1ceb86f69%3A0x5f31c5de7325f729!2sJohn%20Lewis%20Opticians!5e0!3m2!1sen!2snp!4v1592116587032!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0; margin-top: 20px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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

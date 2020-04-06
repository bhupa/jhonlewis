@extends('frontend.app')
@section('title','Register')
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
                                <li aria-current="page" class="breadcrumb-item active">Register</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        @include('shop.sidebar')
                    </div>
                    <div class="col-lg-9">
                        <div class="box">
                            <h1>New account</h1>
                            <p class="lead">Not our registered customer yet?</p>
                            <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                            <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                            <hr>
                         {!! Form::open(['router'=>'register.store','method'=>'post']) !!}
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control"  value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="text" name="address" type="text" class="form-control"  value="{{old('address')}}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input id="text" name="contact" type="text" class="form-control"  value="{{old('contact')}}">
                                    @if ($errors->has('contact'))
                                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control"  value="{{old('password')}}">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            <div class="form-group">
                                <label for="password">Confirm-Password</label>
                                <input id="confirm" name="confirm" type="password" class="form-control"  value="{{old('confirm')}}">
                                @if ($errors->has('confirm'))
                                    <span class="text-danger">{{ $errors->first('confirm') }}</span>
                                @endif
                            </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                                </div>
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

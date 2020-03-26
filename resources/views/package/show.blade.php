@extends('frontend.app')
@section('title', $package->title)
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
                                <li aria-current="page" class="breadcrumb-item active">Package</li>
                                <li aria-current="page" class="breadcrumb-item active">{{$package->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        @include('shop.sidebar')
                    </div>
                    <div class="col-lg-9">
                        <div id="contact" class="box">
                            <ul style="list-style: none;padding:0px;">
                                <li>Start Date: <span>{{date('d-M-Y', strtotime($package->start_date))}}</span></li>
                                <li>End Date: <span>{{date('d-M-Y', strtotime($package->end_date))}}</span></li>
                            </ul>
                            <p class="lead">
                                {!! $package->description !!}
                            </p>



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

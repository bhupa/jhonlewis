@extends('frontend.app')
@section('title','Service')
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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Service</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="advantages">
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
                    <!-- /.col-lg-9-->

                </div>
                <!-- /.col-lg-3-->
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

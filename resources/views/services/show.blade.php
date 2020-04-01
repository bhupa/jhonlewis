@extends('frontend.app')
@section('title', $service->title)
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
                                <li aria-current="page" class="breadcrumb-item active">service</li>
                                <li aria-current="page" class="breadcrumb-item active">{{$service->title}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        @include('shop.sidebar')
                    </div>
                    <div class="col-lg-9">
                        <div id="contact" class="box">
                            <p class="lead">
                                {!! $service->description !!}
                            </p>
                            @if(Auth::check())
                                <div class="box">
                                    {!! Form::open(['route'=>'testimonial.store','method'=>'post']) !!}
                                    {{--                        <form method="get" action="checkout2.html">--}}
                                    <h3>How is our service</h3>
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            <span>{!! \Session::get('success') !!}</span>
                                        </div>
                                    @endif
                                    <div class="content py-3">
                                        <input type="hidden" name="id" value="{{$service->id}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea style="height: 200px" id="description"  name="description" class="form-control"></textarea>
                                                @if ($errors->has('message'))
                                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                                @endif
                                            </div>
                                            </div>

                                        </div>
                                        <!-- /.row-->
                                    </div>
                                    <div class="box-footer d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                    </div>
                                    {{--                        </form>--}}
                                    {{Form::close()}}
                                </div>

                            @endif

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

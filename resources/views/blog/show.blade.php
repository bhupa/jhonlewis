@extends('frontend.app')
@section('title', $blog->title)
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
                                {{--<li aria-current="page" class="breadcrumb-item active">Blog</li>--}}
                                {{--<li aria-current="page" class="breadcrumb-item active">{{$blog->title}}</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3">--}}
                        {{--@include('shop.sidebar')--}}
                    {{--</div>--}}
                    <div class="col-lg-12">
                        <div id="contact" class="box" style="margin-top: 50px">
                            <ul class="blog-single-post-list">
                                <li><i class="fa fa-file"></i> <span>{{$blog->category->name}}</span></li>
                                <li><i class="fa fa-edit"></i> <span>{{$blog->author->name}}</span></li>
                                <li><i class="fa fa-calendar"></i> <span>{{date('d-M-Y', strtotime($blog->created_at))}}</span></li>
                                <li><i class="fa fa-eye"></i> <span>{{$blog->view}}</span></li>
                            </ul>

                            <h3>{{$blog->title}}</h3>
                            <p class="lead">
                                {!! $blog->description !!}
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

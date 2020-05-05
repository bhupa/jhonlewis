@extends('frontend.app')
@section('title','Blog')
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
                                {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                                {{--<li aria-current="page" class="breadcrumb-item active">Blog</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                    <div id="checkout" class="col-lg-12">

                        <div id="blog-homepage" class="row" style="margin-top: 50px;">
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
                        <!-- /.box-->
                        <div class="pages">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    {{ $blogs->links('vendor.pagination.default') }}
                                </nav>
                            </nav>
                        </div>
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

@extends('frontend.app')
@section('title','Shoping Lists')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        @foreach( $banners as $banner)
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
            <div class="container">
                <div class="brand-listing">
                    <div class="row">
                        @foreach($brands as $brand)
                        <div class="col-lg-4">
                            <div class="brand-wrapper">
                                <a href="{{route('brands.show',[$brand->slug])}}">
                                    <img src="{{asset('storage/'.$brand->image)}}" alt="{{$brand->name}}">
                               <div class="brand-overlay">
                                   {!! $brand->short_description !!}
                               </div>
                                </a>
                            </div>

                        </div>
                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

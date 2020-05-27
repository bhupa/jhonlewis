@extends('frontend.app')
@section('title','Shopping Lists')
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
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('brands.show',[$brand->slug])}}">
                                <div class="card">
                                    <div class="card-img-actions ">
                                        <img class="card-img img-fluid" src="{{asset('storage/'.$brand->image)}}" alt="{{$brand->name}}" style=" height:200px;">

                                        <div class="card-img-actions-overlay card-img">
                                            {{--<a href="{{url('brands/'.$brand->slug.'/eye-wear')}}" data-toggle="lightbox" data-tour-image="tour-image" class="brand-type-eye btn btn-outline    border-2 btn-icon rounded-round">--}}

                                            {{--Eye Wear {{$brand->type}}--}}
                                            {{--</a>--}}

                                            {{--<a href="{{url('brands/'.$brand->slug.'/sunglass')}}" data-type="1" data-tour-image="1" class="brand-type-sunglass btn btn-outline   border-2 btn-icon rounded-round ml-2 delete-galleries-image">--}}
                                            {{--Sunglass--}}

                                            {{--</a>a--}}
                                        </div>
                                    </div>
                                </div>
                            </a>



                            {{--<div class="brand-wrapper">--}}
                                {{--<a href="{{route('brands.show',[$brand->slug])}}" class="overlay">--}}
                                    {{--<img src="{{asset('storage/'.$brand->image)}}" alt="{{$brand->name}}">--}}
                                   {{--<div class="brand-overlay">--}}
                                       {{--{!! $brand->short_description !!}--}}
                                       {{----}}
                                   {{--</div>--}}

                                {{--</a>--}}
                            {{--</div>--}}

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

@extends('frontend.app')
@section('title','Shoping Lists')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
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

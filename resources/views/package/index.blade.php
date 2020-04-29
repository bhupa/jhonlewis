@extends('frontend.app')
@section('title','Contact Us')
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
                                <li aria-current="page" class="breadcrumb-item active">Packages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="hot">

            <div class="container">
                <div class="packages-slider-details ">
                    <div class="row">
                        @foreach($packages as $package)

                            <div class="col-lg-4">
                                <div class="media mb-3">
                                    <a class="pull-left" href="{{route('package.show',[$package->slug])}}">
                                        <img style="width:100px;height:100px" class="media-object"
                                             src="{{asset('storage/'.$package->image)}}" alt="{{$package->title}}">
                                    </a>

                                    <div class="media-body" style="padding:0px 15px;">
                                        <h4 class="media-heading">{{str_limit($package->title,'20','....')}}</h4>
                                        <p class="mb-0" style="font-weight: 300;text-align:left;">
                                            {{str_limit($package->short_description,'100','.....')}}
                                        </p>
                                        <a href="{{route('package.show',[$package->slug])}}">Read More</a>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>

                    <div class="pages">
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                {{ $packages->links('vendor.pagination.default') }}
                            </nav>
                        </nav>
                    </div>
                </div>
                <!-- /.container-->
            </div>
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>
    </div>
@endsection
@section('js_script')
@endsection

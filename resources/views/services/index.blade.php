@extends('frontend.app')
@section('title','Service')
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
                                {{--<li aria-current="page" class="breadcrumb-item active">Service</li>--}}
                            {{--</ol>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                    {{--<div id="advantages">--}}
                        {{--<div class="container">--}}
                            {{--<div class="row mb-4">--}}
                                {{--@foreach($services as $service)--}}
                                    {{--<div class="col-md-4 mb-4">--}}
                                        {{--<div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">--}}
                                            {{--<div class="icon">--}}
                                                {{--<img style="width:80px; height: 80px;opacity:0.5" src="{{asset('storage/'.$service->image)}}" alt="{{$service->title}}">--}}
                                            {{--</div>--}}
                                            {{--<h3><a href="{{route('service.show',[$service->slug])}}" style="color: #000; font-weight:500">{{$service->title}}</a></h3>--}}
                                            {{--<p class="mt-4 mb-0">{{str_limit($service->short_description,'100','....')}}</p>--}}
                                            {{--<a href="{{route('service.show',[$service->slug])}}">Read More</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                            {{--<!-- /.row-->--}}
                        {{--</div>--}}
                        {{--<!-- /.container-->--}}
                    {{--</div>--}}


                    <div class="col-lg-4">

                        <div class="service-lists">
                            <h2>{{$content->title}}</h2>

                            <hr>
                            <ul>
                                @foreach($services as $service)
                                    <li><a href="javascript:void(0)" class="service-lists-btn" data-type="{{$service->slug}}">{{$service->title}}</a></li>
                                @endforeach

                            </ul>

                            <a href="{{route('service.index')}}">Back to Service</a>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="service-lists-content">
                            <h4>Services</h4>
                            <hr>
                            <img src="{{asset('storage/'.$content->image)}}" alt="{{$content->title}}">
                            {!! $content->description !!}
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
    <script type="text/javascript">
        $(document).ready(function () {

          $('.service-lists-btn').on('click',function(event){
              event.preventDefault();

              $('.service-lists ul li a').removeClass('active');
              $object = $(this);
              var slug  = $(this).attr('data-type');
              var url = baseUrl+"/service/"+slug;


              $.ajax({
                  type: "get",
                  url: url,
                  data: {
                      slug: slug,

                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (service) {
                      $object.addClass('active');
                      $('.service-lists-content').html(service);

                  },
                  error: function (e) {
                      if (e.responseJSON.message) {
                          swal('Error', e.responseJSON.message, 'error');
                      } else {
                          swal('Error', 'Something went wrong while processing your request.', 'error')
                      }
                  }
              });

          })

        });
        </script>
@endsection

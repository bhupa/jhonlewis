@extends('frontend.app')
@section('title','Appointment')
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
                            <li aria-current="page" class="breadcrumb-item active">Appointment</li>
                        </ol>
                    </nav>
                </div>
                <div id="checkout" class="col-lg-8">
                    <div class="box">
                        {!! Form::open(['route'=>'appointment.store','method'=>'post']) !!}
{{--                        <form method="get" action="checkout2.html">--}}
                            <h1>Appointment Details</h1>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">

                                    <span>{!! \Session::get('success') !!}</span>

                            </div>

                        @endif
                            <div class="content py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input id="firstname" name="firstname" type="text" class="form-control" value="{{old('firstname')}}">
                                            @if ($errors->has('firstname'))
                                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input id="lastname" name="lastname" type="text" class="form-control" value="{{old('lastname')}}">
                                            @if ($errors->has('lastname'))
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company">Address</label>
                                            <input id="address" name="address" type="text" class="form-control" value="{{old('address')}}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="street">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="{{old('phone')}}">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Date</label>
                                            <input class="form-control enchilada" type="date"  name="date" data-placeholder="Start Date" placeholder="2018-03-05" id="datepicker" value="{{ old('date') }}">

                                            @if ($errors->has('date'))
                                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row-->
                            </div>
                            <div class="box-footer d-flex justify-content-between">
                                @if(Auth::check())
                                <button type="submit" class="btn btn-primary">Book Appointment</button>
                                    @else
                                    <button type="button" id="appointment-url" data-type="{{route('appointment.index')}}" class="btn btn-primary">Book Appointment</button>
                                @endif
                            </div>
{{--                        </form>--}}
                        {{Form::close()}}
                    </div>

                    <!-- /.box-->
                </div>
                <!-- /.col-lg-9-->
                <div class="col-lg-4">
                    <div id="order-summary" class="card">
                        <div class="card-header" style="margin-bottom: 20px;">
                            <h3 class="mt-4 mb-4">Recently Post</h3>
                        </div>
                        @foreach($blogs as $blog)
                            <div class = "media">
                                <a class ="pull-left" href = "#">
                                    <img style="width:100px;height:100px" class="media-object" src ="{{asset('storage/'.$blog->image)}}" alt = "{{$blog->title}}">
                                </a>

                                <div class="media-body" style="padding:0px 15px;">
                                    <h4 class = "media-heading">{{str_limit($blog->title,'20','....')}}</h4>
                                    <p style="font-weight: 300;text-align:left;">
                                        {{str_limit($blog->short_description,'100','.....')}}
                                    </p>

                                    <span>
                                        <i class="fa fa-calendar"></i>
                                         {{date('d-M-Y', strtotime($blog->created_at))}}
                                    </span>
                                    <span style="margin-left: 20px">
                                        <i class="fa fa-eye"></i>
                                         {{$blog->view}}
                                    </span>
                                </div>
                            </div>
                        <hr>
                            @endforeach


                    </div>
                    </div>
                </div>
                <!-- /.col-lg-3-->

            </div>
        </div>
    </div>
</div>

@endsection
@section('js_script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#appointment-url').on('click', function () {
                var url = $(this).attr('data-type');
                $('#url').val(url)
                $('#login-modal').modal('show');
            })
        });
    </script>
@endsection

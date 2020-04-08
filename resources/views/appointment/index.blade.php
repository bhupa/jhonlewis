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




{{--                        <div class="response"></div>--}}
{{--                        <div id='calendar'></div>--}}

                    <div class="box">


                            <h1>Appointment Details</h1>
                        {!! $calendar->calendar() !!}

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

        // function displayMessage(message) {
        //     $(".response").html("
        //     "+message+"
        //     ");
        //     setInterval(function() { $(".success").fadeOut(); }, 1000);
        // }
        {{--$(function() {--}}
        {{--    ;--}}
        {{--    $('#calendar-{{$calendar->getId()}}').fullCalendar({--}}
        {{--        selectable: true,--}}
        {{--        header: {--}}
        {{--            left: 'prev,next today',--}}
        {{--            center: 'title',--}}
        {{--            right: 'month,agendaWeek,agendaDay'--}}
        {{--        },--}}
        {{--        dayClick: function(date) {--}}
        {{--            alert('clicked ' + date.format());--}}
        {{--        },--}}
        {{--        select: function(startDate, endDate) {--}}
        {{--            alert('selected ' + startDate.format() + ' to ' + endDate.format());--}}
        {{--        }--}}
        {{--    });--}}

        {{--});--}}
    </script>
    {!! $calendar->script() !!}

@endsection

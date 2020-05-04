@extends('frontend.app')
@section('title','Appointment')
@section('css_script')
@endsection
@section('content')

<div id="all">
    <div id="content">
        <div class="container">
            <div class="row">


                    <div class="appointment-form" style="margin-top: 50px;">
                            <div class="appointment-title">
                                <h2>REQUEST AN APPOINTMENT</h2>
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">

                                        <span>{!! \Session::get('success') !!}</span>

                                    </div>

                                @endif
                            </div>
                        <div class="fl-module-content fl-node-content">
                            <div class="pp-infolist-wrap">
                                <div class="pp-infolist layout-3">
                                    <ul class="layout-3-wrapper"> 					<li class="pp-list-item pp-list-item">
                                            <div class="pp-icon-wrapper animated none">
                                                <div class="pp-infolist-icon">
                                                    <div class="pp-infolist-icon-inner">
                                                        <span class="pp-icon "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pp-infolist-title">
                                                <h3 class="pp-infolist-title-text child-line">1</h3>
                                            </div>
                                            <div class="pp-infolist-description">
                                            </div>
                                            <div class="pp-list-connector" ></div>
                                        </li> 					<li class="pp-list-item pp-list-item">
                                            <div class="pp-icon-wrapper animated none">
                                                <div class="pp-infolist-icon">
                                                    <div class="pp-infolist-icon-inner">
                                                        <span class="pp-icon "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pp-infolist-title">
                                                <h3 class="pp-infolist-title-text child-line">2</h3>
                                            </div>
                                            <div class="pp-infolist-description">
                                            </div>
                                            <div class="pp-list-connector" ></div>
                                        </li> 					<li class="pp-list-item pp-list-item">
                                            <div class="pp-icon-wrapper animated none">
                                                <div class="pp-infolist-icon">
                                                    <div class="pp-infolist-icon-inner">
                                                        <span class="pp-icon "></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pp-infolist-title">
                                                <h3 class="pp-infolist-title-text">3</h3>
                                            </div>
                                            <div class="pp-infolist-description">
                                            </div>
                                            <div class="pp-list-connector" ></div>
                                        </li> 		</ul>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-form">
                            {!! Form::open(['route'=>'appointment.store','method'=>'Post']) !!}
                            <div class="row">
                                <div class="col-lg-4 contact-details1">
                                    <h4><span>Contact Details</span></h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <select name="gender" class="form-control" aria-required="true" aria-invalid="false">
                                                    <option value="">Title*</option>
                                                    <option value="Mr." {{(old('title')== 'Mr.')? 'selected':''}}>Mr.</option>
                                                    <option value="Mrs." {{(old('title')== 'Mrs.')? 'selected':''}}>Mrs.</option>
                                                    <option value="Miss" {{(old('title')== 'Miss')? 'selected':''}}>Miss</option>
                                                    <option value="Others" {{(old('title')== 'Others')? 'selected':''}}>Others</option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="firstname" placeholder="First name*"  value="{{old('firstname')}}">
                                                @if ($errors->has('firstname'))
                                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastname" placeholder="Surname*" value="{{old('lastname')}}">
                                        @if ($errors->has('lastname'))
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phone" placeholder="Phone number*" value="{{old('phone')}}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email*" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-4 contact-details1">
                                    <h4><span>Preferred Appointment</span></h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="text" name="date" class="form-control datepicker" placeholder="Select date *" autocomplete="off" value="{{old('date')}}">
                                                @if ($errors->has('date'))
                                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                
                                                <select name="time" class="form-control" aria-required="true" aria-invalid="false">
                                                    <option value="">Select Time*</option>
                                                    <option value="Early Morning"{{(old('time')== 'Early Morning')? 'selected':''}}>Early Morning</option>
                                                    <option value="Late Morning"{{(old('time')== 'Late Morning')? 'selected':''}}>Late Morning</option>
                                                    <option value="Early Afternoon"{{(old('time')== 'Early Afternoon')? 'selected':''}}>Early Afternoon</option>
                                                    <option value="Late Afternoon"{{(old('time')== 'Late Afternoon')? 'selected':''}}>Late Afternoon</option>
                                                </select>
                                                @if ($errors->has('time'))
                                                    <span class="text-danger">{{ $errors->first('time') }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="appo-details">Appointment Details</h4>

                                    <span class="list-item first">
                                        <input type="radio" name="details" {{(old('details')== 'Eye Examination')? 'checked':''}}  value="Eye Examination"><span class="list-item-label">Eye Examination
                                        </span>
                                    </span>
                                    <span class="list-item ">
                                        <input type="radio" name="details" {{(old('details')== 'Contact Lens Aftercare')? 'checked':''}}  value="Contact Lens Aftercare"><span class="list-item-label">Contact Lens Aftercare
                                        </span>
                                    </span>
                                    <span class="list-item ">
                                        <input type="radio" name="details" {{(old('details')== 'Contact Lens Fitting')? 'checked':''}}  value="Contact Lens Fitting"><span class="list-item-label">Contact Lens Fitting
                                        </span>
                                    </span>
                                    <span class="list-item ">
                                        <input type="radio" name="details" {{(old('details')== 'Frame Consultation')? 'checked':''}}  value="Frame Consultation"><span class="list-item-label">Frame Consultation
                                        </span>
                                    </span>
                                    <span class="list-item ">
                                        <input type="radio" name="details" {{(old('details')== 'Others')? 'checked':''}}  value="Others"><span class="list-item-label">Others
                                        </span>
                                    </span><br>
                                    @if ($errors->has('details'))
                                        <span class="text-danger">{{ $errors->first('details') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4 contact-details1">
                                    <h4>
                                        <span></span></h4>

                                    <p>Request your appointment and a member of the team will call you back.</p>

                                    <div class="submit-btn">
                                        <button type="submit" value="REQUEST AN APPOINTMENT">REQUEST AN APPOINTMENT</button>
                                    </div>

                                    <p>If you need any help please call us</p><br>

                                    <span class="phone-number text-center">02083161121</span>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>

                {{--<div id="checkout" class="col-lg-8">--}}




{{--                        <div class="response"></div>--}}
{{--                        <div id='calendar'></div>--}}

                    {{--<div class="box">--}}


                            {{--<h1>Appointment Details</h1>--}}
                        {{--{!! $calendar->calendar() !!}--}}

                    {{--</div>--}}

                    {{--<!-- /.box-->--}}
                {{--</div>--}}
                {{--<!-- /.col-lg-9-->--}}
                {{--<div class="col-lg-4">--}}
                    {{--<div id="order-summary" class="card">--}}
                        {{--<div class="card-header" style="margin-bottom: 20px;">--}}
                            {{--<h3 class="mt-4 mb-4">Recently Post</h3>--}}
                        {{--</div>--}}
                        {{--@foreach($blogs as $blog)--}}
                            {{--<div class = "media">--}}
                                {{--<a class ="pull-left" href = "#">--}}
                                    {{--<img style="width:100px;height:100px" class="media-object" src ="{{asset('storage/'.$blog->image)}}" alt = "{{$blog->title}}">--}}
                                {{--</a>--}}

                                {{--<div class="media-body" style="padding:0px 15px;">--}}
                                    {{--<h4 class = "media-heading">{{str_limit($blog->title,'20','....')}}</h4>--}}
                                    {{--<p style="font-weight: 300;text-align:left;">--}}
                                        {{--{{str_limit($blog->short_description,'100','.....')}}--}}
                                    {{--</p>--}}

                                    {{--<span>--}}
                                        {{--<i class="fa fa-calendar"></i>--}}
                                         {{--{{date('d-M-Y', strtotime($blog->created_at))}}--}}
                                    {{--</span>--}}
                                    {{--<span style="margin-left: 20px">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                         {{--{{$blog->view}}--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--<hr>--}}
                            {{--@endforeach--}}


                    {{--</div>--}}
                    {{--</div>--}}
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
        $(function() {
            var active_dates = '{{json_encode($scheduls)}}';
            var vardata = JSON.parse(active_dates.replace(/&quot;/g,'"'));
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                todayHighlight: true,
                beforeShowDay: function(date){
                    var d = date;
                    var curr_date = d.getDate();
                    var curr_month = ("0" + (d.getMonth() + 1)).slice(-2);
                    var curr_year = d.getFullYear();
                    var formattedDate = curr_date + "/" + curr_month + "/" + curr_year

                    if ($.inArray(formattedDate, vardata) != -1){
                        return {
                            classes: 'activeClass'
                        };
                    }
                    else{
                        return false;
                    }
                    return;
                }
            });
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

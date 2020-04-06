@extends('frontend.app')
@section('title','Profile')
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
                        *** CUSTOMER MENU ***
                        _________________________________________________________

                        <!-- /.col-lg-3-->
                        <!-- *** CUSTOMER MENU END ***-->
                        @include('profile.menu')
                    </div>
                    <div id="customer-order" class="col-lg-9">
                        <div class="box">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="profile">
                                        <div class="profile-wrapper">
                                            <div class="profile-image">
                                                @if(file_exists('storage/'.Auth::user()->image) && Auth::user()->image !='')
                                                    <img class="img-fluid" id="profile-image" src="{{asset('storage/'.Auth::user()->image)}}" alt="{{Auth::user()->name}}">
                                                @else

                                                    <img class="img-fluid" id="profile-image" src="{{asset('backend/dist/img/placeholder.png')}}" alt="{{Auth::user()->name}}">
                                                @endif
                                            </div>
                                            <div class="profile-details-lists">
                                                <ul>
                                                    <li><span>User Name:</span>{{Auth::user()->name}}</li>
                                                    <li><span>First Name:</span>{{Auth::user()->firstname}}</li>
                                                    <li><span>last Name:</span>{{Auth::user()->lastname}}</li>
                                                    <li><span>Email:</span>{{Auth::user()->email}}</li>
                                                    <li><span>Address:</span>{{Auth::user()->address}}</li>
                                                    <li><span>Phone:</span>{{Auth::user()->phone}}</li>
                                                    <li><span>Street:</span>{{Auth::user()->street}}</li>
                                                    <li><span>Country:</span>{{Auth::user()->country}}</li>
                                                    <li><span>State:</span>{{Auth::user()->state}}</li>
                                                    <li><span>Account:</span>@if(empty(Auth::user()->admin)) Customer Account @endif</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h3>Profile Summary</h3>

                                   <div class="row">
                                       <div class="col-lg-6">
                                           <div class="profile-box">
                                                    <div class="profile-box-title">
                                                        <h3>Appointment</h3>
                                                        @if(!empty($latest))
                                                            <div class="profile-box-content">
                                                                <a href="javascript:void(0)"><i class="fa fa-calendar"></i> {{date('d-M-Y', strtotime($latest->date)) }}</a>
                                                                <p>
                                                                    @php $date1=new DateTime($latest->date) @endphp
                                                                    @php $date2=new DateTime(date("Y/m/d")) @endphp
                                                                    @php $diff = $date2->diff($date1)->format("%a"); @endphp
                                                                    @php $days = intval($diff); @endphp
                                                                    There is only {{$days }} Days left for your appointment.
                                                                </p>
                                                            </div>
                                                            @else
                                                            <p>You havent made booked appointment till now</p>
                                                            @endif
                                                    </div>
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="profile-box box-blue">
                                               <div class="profile-box-title text-center">
                                                   <h3>Recent Order</h3>
                                                   <div class="profile-box-content">
                                                       @if(!empty($order))
                                                           <ul>
                                                               <li><span>Item:</span>{{$order->total_item}}</li>
                                                               <li><span>Serial No:</span>{{$order->serial_number}}</li>
                                                               <li><span>Total Amount:</span>{{$order->total_amount}}</li>
                                                               <li><span>Released:</span>
                                                                   @if($order->received == '1')
                                                                       <span class="badge badge-info">received</span>
                                                                   @else
                                                                       <span class="badge badge-info">not received yet</span>
                                                                   @endif
                                                               </li>
                                                           </ul>
                                                           @else
                                                           <p>You havent made order till now</p>
                                                           @endif
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="profile-box box-violet">
                                               <div class="profile-box-title text-center">
                                                   <h3>Total  Orders</h3>
                                                   <div class="profile-box-content">
                                                       <ul>
                                                           <li><span>Total:</span>{{count($total)}}</li>
                                                           <li><span>Reeived:</span>{{count($received)}}</li>
                                                           <li><span>Not Received:</span>{{count($notreceived)}}</li>

                                                       </ul>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="profile-box box-darkorange">
                                               <div class="profile-box-title text-center">
                                                   <h3>Total Amount </h3>
                                                   <div class="profile-box-content">
                                                       <p>You have already spend
                                                            @php $number = $total->sum('total_amount') @endphp
                                                           @if ($number > 100)
                                                               {{number_format($number/100,2)}}
                                                                H,
                                                           @elseif($number > 1000) {
                                                           {{number_format($number/1000,2)}}
                                                               K,
                                                          @else 
                                                           {{number_format($number/1000000,2).'M'}}
                                                               M,
                                                         @endif
                                                           amount of money</p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                   </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

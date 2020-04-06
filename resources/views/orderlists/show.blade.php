@extends('frontend.app')
@section('title','Order-Lists-show')
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
                                <li aria-current="page" class="breadcrumb-item">My orders</li>
                                <li aria-current="page" class="breadcrumb-item active">{{ $orders->serial_number}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        @include('profile.menu')

                    </div>
                    <div id="customer-order" class="col-lg-9">
                        <div class="box">
                            <p class="lead">Order {{$orders->serial_number}} was placed on <strong>{{date('d-m-Y', strtotime($orders->created_at))}}</strong> and is currently <strong>Being prepared</strong>.</p>
                            <p class="text-muted">If you have any questions, please feel free to <a href="{{route('contact-us.index')}}">contact us</a>, our customer service center is working for you 24/7.</p>
                            <hr>
                            <div class="table-responsive mb-4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th >Product</th>
                                        <th>Color</th>
                                        <th>Received</th>
                                        <th>Return</th>
                                        <th>Piece</th>
                                        <th>Unit price</th>
                                        <th>Discount</th>
                                        <th>Total</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $totalAmout=0; $totalquantity=0;@endphp
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td><a href="{{route('product.show',[$sale->product->slug])}}"><img src="https://d19m59y37dris4.cloudfront.net/obaju/2-1-1/img/detailsquare.jpg" alt="White Blouse Armani"></a></td>
                                        <td><a href="{{route('product.show',[$sale->product->slug])}}">{{$sale->product->title}}}</a></td>
                                        <td>{{$sale->stock->color->name}}</td>
                                        <td>
                                            @if($sale->dispatch == '1')
                                                <span class="badge badge-success">received</span>
                                                @else
                                                <span class="badge badge-warning">not-received</span>
                                            @endif
                                        </td>
                                        <td>@if($sale->return == '1')
                                                <span class="badge badge-danger">Cancelled</span>
                                                @else
                                            <span class="badge badge-success">not return</span>
                                                @endif
                                        </td>
                                        <td>{{$sale->piece}}</td>
                                        <td>£ &nbsp;{{$sale->unit_price}}</td>
                                        <td>£ &nbsp;{{$sale->discount_amount}}</td>
                                        <td>£ &nbsp;{{$sale->price}}</td>
                                    </tr>
                                    @php $totalAmout +=  $sale->price@endphp
                                    @php $totalquantity +=  $sale->piece @endphp
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="8" class="text-right">Order subtotal</th>
                                        <th>{{$totalAmout}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" class="text-right">Shipping and handling</th>
                                        <th>{{$orders->shipping_amount}}</th>
                                    </tr>

                                    <tr>
                                        <th colspan="8" class="text-right">Total</th>
                                        <th>{{$orders->total_amount}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive-->
                            <div class="row addresses">
                                <div class="col-lg-6">
                                    <h2>Invoice address</h2>
                                    <p>{{ auth()->user()->name}}<br>{{ auth()->user()->address}}<br>{{ auth()->user()->country}}<br>{{ auth()->user()->phone}}<br>{{ auth()->user()->email}}</p>
                                </div>
                                <div class="col-lg-6">
                                    <h2>Shipping address</h2>
                                    <p>{{$orders->shipping->first_name}} &nbsp;{{$orders->shipping->last_name}}<br>1{{$orders->shipping->street}}<br>{{$orders->shipping->address}}<br>{{$orders->shipping->phone}}<br>{{$orders->shipping->email}}</p>
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

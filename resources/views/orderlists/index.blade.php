@extends('frontend.app')
@section('title','Order-Lists')
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
                                <li aria-current="page" class="breadcrumb-item"><a href="{{route('order-lists.index')}}">My orders</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Order # 1735</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        @include('profile.menu')

                    </div>
                    <div id="customer-order" class="col-lg-9">
                        <table class="table text-center" id="table">
                            <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Serial Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Items</th>
                                <th scope="col">Shipping</th>
                                <th scope="col">Amount</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody id="sortable">
                            @php $totalAmout=0; $totalquantity=0;@endphp
                            @foreach($orders as $key=>$item)
                                <tr id="item-{{$item->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->serial_number}}</td>
                                    <td>
                                        {{date('d-M-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td>{{$item->total_item}}</td>
                                    <td>£ &nbsp;{{$item->shipping_amount}}</td>
                                    <td>£ &nbsp;{{$item->total_amount}}</td>
                                    <td>
                                        @php $totalAmout +=  $item->total_amount @endphp
                                        @php $totalquantity +=  $item->total_item @endphp
                                        <a href="{{route('order-lists.show', [$item->id])}}" class="edit-modal btn btn-info btn-circle btn-sm"
                                           data-info="">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot style="background: #ffffff">
                            <tr>

                                <td colspan="3">Total:</td>
                                <td colspan="">{{ $totalquantity}}</td>
                                <td></td>
                                <td>£ {{number_format((float)$totalAmout, 2, '.', '')}}</td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

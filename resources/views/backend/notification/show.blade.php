@extends('backend.app')
@section('title','Sells-Report')
@section('content')
    <div class="content-wrapper" style="min-height: 1416.81px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                        </div>


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i>
                                        @foreach($settings as $setting)
                                            @if($setting->slug == 'company-name')
                                                {{$setting->value}}
                                            @endif
                                        @endforeach.
                                        <small class="float-right">Date: {{date('d-M-Y', strtotime($order->created_at)) }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        @foreach($settings as $setting)
                                            @if($setting->slug == 'company-name')
                                                {{$setting->value}} <br>
                                            @endif
                                            @if($setting->slug == 'address')
                                                {{$setting->value}} <br>
                                            @endif
                                            @if($setting->slug == 'phone')
                                                Phone: {{$setting->value}} <br>
                                            @endif
                                            @if($setting->slug == 'email')
                                                Email: {{$setting->value}}
                                            @endif
                                        @endforeach
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{$order->shipping->first_name}} &nbsp;{{$order->shipping->last_name}}</strong><br>
                                        {{$order->shipping->street}}<br>
                                        {{$order->shipping->address}}<br>
                                        Phone: {{$order->shipping->phone}}<br>
                                        Email: {{$order->shipping->email}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice {{$order->serial_number}}</b><br>
                                    <br>
                                    {{--                                    <b>Order ID:</b> 4F3S8J<br>--}}
                                    {{--                                    <b>Payment Due:</b> 2/22/2014<br>--}}
                                    {{--                                    <b>Account:</b> 968-34567--}}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" id="invoice">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Color</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                            <th>Released</th>
                                            <th>Return</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->sales as $key=>$sale)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <img style="width:100px;height:70px;" src="{{asset('storage/'.$sale->stock->image)}}" alt="{{$sale->stock->title}}">
                                                    </a>
                                                </td>
                                                <td>{{$sale->stock->products->title}}</td>
                                                <td>{{$sale->stock->color->name}}</td>
                                                <td>{{$sale->piece}}</td>
                                                <td>{{$sale->unit_price}}</td>
                                                <td>{{$sale->discount_price}}</td>
                                                <td>{{$sale->price}}</td>
                                                <td>
                                                    @if($sale->dispatch == '1')
                                                        <a href="javascript:void(0)"  data-type="{{$sale->id}}" id="dispatch" class="edit-modal btn btn-sm btn-circle btn-success published"  title="change-status"
                                                           data-toggle="tooltip"> <i class="fas fa-check" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)"  data-type="{{$sale->id}}" id="dispatch" class="edit-modal btn btn-sm btn-circle btn-success unpublished"   title="change-status"
                                                           data-toggle="tooltip"> <i class="fas fa-minus" aria-hidden="true"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($sale->return == '1')
                                                        <a href="javascript:void(0)"  data-type="{{$sale->id}}" id="return" class="edit-modal btn btn-sm btn-circle btn-success published"  title="change-status"
                                                           data-toggle="tooltip"> <i class="fas fa-check" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)"  data-type="{{$sale->id}}" id="return" class="edit-modal btn btn-sm btn-circle btn-success unpublished"   title="change-status"
                                                           data-toggle="tooltip"> <i class="fas fa-minus" aria-hidden="true"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="delete-sales-item btn btn-danger btn-circle btn-sm"
                                                       data-type="{{$sale->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due 2/22/2014</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody><tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>{{$order->total_amount - $order->shipping_amount}}</td>
                                            </tr>

                                            <tr>
                                                <th>Shipping:</th>
                                                <td>
                                                    {{ $order->shipping_amount}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{$order->total_amount}}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js_script')
    <script>
        $(document).ready( function () {

            $('#invoice').on('click','.delete-sales-item',function(event){
                event.preventDefault();

                $object = $(this);
                var id  = $(this).attr('data-type');
                var url = baseUrl+"/sales/"+id;
                swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this !',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value
                    )
                    {

                        $.ajax({
                            type: "Delete",
                            url: url,
                            data: {
                                id: id,
                                _method: 'DELETE'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                swal("Deleted!", response.message, "success");

                                var nRow = $($object).parents('tr')[0];
                                nRow.remove();
                            },
                            error: function (e) {
                                if (e.responseJSON.message) {
                                    swal('Error', e.responseJSON.message, 'error');
                                } else {
                                    swal('Error', 'Something went wrong while processing your request.', 'error')
                                }
                            }
                        });
                    }
                })
            })


            $("#invoice").on("click", "#dispatch", function () {
                $object = $(this);
                var id = $(this).attr('data-type');
                var role = $(this).attr('data-role');
                swal({
                    title: 'Are you sure?',
                    text: 'Do you want to change the status',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('sales.realeased') }}",
                            data: {
                                'id': id,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (response) {
                                swal("Thank You!", response.message, "success");
                                if (response.sales.dispatch == 1) {
                                    $($object).children().removeClass('fa fa-minus');
                                    $($object).children().addClass('fa fa-check');
                                } else {
                                    $($object).find('.unpublished').html('<i class="fa fa-minus" aria-hidden="true"></i>');
                                    $($object).children().removeClass('fa fa-check');
                                    $($object).children().addClass('fa fa-minus');
                                }
                            },
                            error: function (e) {
                                if (e.responseJSON.message) {
                                    swal('Error', e.responseJSON.message, 'error');
                                } else {
                                    swal('Error', 'Something went wrong while processing your request.', 'error')
                                }
                            }
                        });

                    }
                })
            });
            $("#invoice").on("click", "#return", function () {
                $object = $(this);
                var id = $(this).attr('data-type');
                var role = $(this).attr('data-role');
                swal({
                    title: 'Are you sure?',
                    text: 'Do you want to change the status',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('sales.return') }}",
                            data: {
                                'id': id,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (response) {

                                swal("Thank You!", response.message, "success");
                                if (response.sales.return == 1) {
                                    $($object).children().removeClass('fa fa-minus');
                                    $($object).children().addClass('fa fa-check');
                                } else {
                                    $($object).find('.unpublished').html('<i class="fa fa-minus" aria-hidden="true"></i>');
                                    $($object).children().removeClass('fa fa-check');
                                    $($object).children().addClass('fa fa-minus');
                                }
                            },
                            error: function (e) {
                                if (e.responseJSON.message) {
                                    swal('Error', e.responseJSON.message, 'error');
                                } else {
                                    swal('Error', 'Something went wrong while processing your request.', 'error')
                                }
                            }
                        });

                    }
                })
            });







        });

    </script>
@endsection

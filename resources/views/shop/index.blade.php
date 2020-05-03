@extends('frontend.app')
@section('title','Shoping Lists')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->

                        <div class="box info-bar">

                            <div class="row">
                                <div class="col-md-4 col-lg-6 products-showing">
                                    <div class="products-sort-by mt-2 mt-lg-0"><strong>Search By Model</strong>
                                        <input type="text" name="model" placeholder="Product Model No">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-6 products-number-sort">
                                    <div class="products-sort-by mt-2 mt-lg-0"><strong>Search By Model</strong>
                                        <input type="text" name="model" placeholder="Product Model No">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-6 products-number-sort">
                                    <button type="submit" value="Search"></button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row products">

                            @foreach($products as $product)
                            <div class="col-lg-3 col-md-4">
                                <div class="product-single-item">
                                    <a href="{{route('product.show',[$product->slug ])}}" class="shop-lists">
                                        <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">

                                        <p><span class="model text-left">Mod: {{$product->shape}}</span>
                                           </p>
                                        <p>
                                            <span class="brand">Brand:{{$product->brand->name}}</span></p>

                                    </a>
                                </div>

                                <!-- /.product            -->
                            </div>
                            @endforeach

                            <!-- /.products-->
                        </div>
                            <div class="pages" style="margin-bottom: 100px;">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                        {{ $products->links('vendor.pagination.default') }}
                                    </nav>
                                </nav>
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

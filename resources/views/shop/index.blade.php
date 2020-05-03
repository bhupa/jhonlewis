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

                        <div class="box">
                            <h1>Shop Now</h1>
                            <p class="text-center">All the product listed below are avaliable in our store  either you can visit to our store or you can buy it online.</p>
                        </div>
                        <div class="box info-bar">
                            <div class="row">
                                <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                                <div class="col-md-12 col-lg-7 products-number-sort">
                                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                                        <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                                        <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                                <option>Sales first</option>
                                            </select>
                                        </div>
                                    </form>
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

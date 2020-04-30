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

                                <a href="" class="shop-lists">
                                    <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">

                                    <p>Model-{{$product->size}}</p>
                                </a>
                                <!-- /.product            -->
                            </div>
                            @endforeach

                            <!-- /.products-->
                        </div>
                        <div class="pages">
                            <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                                </ul>
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

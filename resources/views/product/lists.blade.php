<div class="service-lists">
    <h2>Order Now</h2>

    <hr>

    @foreach($productlists as $product)
        <div class="product-conten">
            <a href="">
                <div class="new"></div>

                @if(file_exists('storage/'.$product->image) && $product->image != '')
                    <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->title}}">
                @endif
                <div class="product-overlay">
                                            <span class="product-content-span">
                                                <p>Price: <span class="product-overlay-item">£ {{$product->price}}</span></p>
                                                <p>Size: <span class="product-overlay-item">{{$product->size}}</span></p>
                                                @if(!empty($product->brand_id))
                                                <p>Brand: <span class="product-overlay-item">{{$product->brand->name}}</span></p>
                                                @endif
                                            </span>

                </div>
                <p></p>
            </a>
        </div>
    @endforeach

    <a href="{{route('shop.index')}}" class="btn btn-view-more">Shop Online</a>

</div>
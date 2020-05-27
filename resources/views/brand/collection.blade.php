<div class="dropdown">
    <button class="dropbtn">Collection</button>
    <div class="dropdown-content">
        <div class="row">
            <div class="col-md-4">
                <div class="collection-wrapper">
                    <div class="top-dropdown-title">
                        <a href="">ALL PRESCRIPTION</a>
                    </div>
                    <ul>
                        <li>
                            <a href="{{url('brands/'.$brand->slug.'/men')}}">Men 	</a>
                        </li>
                        <li>
                            <a href="{{url('brands/'.$brand->slug.'/women')}}">Women</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="collection-wrapper">
                    <div class="top-dropdown-title">
                        <a href="">ALL Eye  Wear</a>
                    </div>
                    <ul>
                        <li>
                            <a href="{{url('eye-wear/'.$brand->slug.'/men')}}">Men</a>
                        </li>
                        <li>
                            <a href="{{url('eye-wear/'.$brand->slug.'/women')}}">Women</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="collection-wrapper">
                    <div class="top-dropdown-title">
                        <a href="">ALL SUNGLASSES</a>
                    </div>
                    <ul>
                        <li>
                            <a href="{{route('new-arrival.show',[$brand->slug])}}">New Arrivals</a>
                        </li>
                        <li>
                            {{--<a href="">Present Collection</a>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>
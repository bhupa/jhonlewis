<ul class="navbar-nav mr-auto desktop-menu" id="menu">

    <li class="nav-item"> <a href="{{route('home')}}" class="nav-link {{ (request()->segment(1) == '') ? 'active' : '' }}">Home</a></li>


    <li class="nav-item"> <a href="{{route('content.show',['about-us'])}}" class="nav-link {{ (request()->segment(2) == 'about-us') ? 'active' : '' }}">About Us</a></li>

    <li class="nav-item"> <a href="{{route('service.index')}}" class="nav-link {{ (request()->segment(1) == 'service') ? 'active' : '' }}">Services</a></li>
    <li class="nav-item"> <a href="{{route('content.show',['eye-care'])}}" class="nav-link {{ (request()->segment(2) == 'eye-care') ? 'active' : '' }}">Eye Care</a></li>
    <li class="nav-item"> <a href="{{route('content.show',['frame-brand'])}}" class="nav-link {{ (request()->segment(2) == 'frame-brand') ? 'active' : '' }}">Frames & Brands</a>
    <li class="nav-item"> <a href="{{route('content.show',['contact-lens'])}}" class="nav-link {{ (request()->segment(2) == 'contact-lens') ? 'active' : '' }}">Contact Lens</a></li>


        {{--<ul class="sub-menu">--}}
            {{--@foreach($brands as $brand)--}}
                {{--<li><a href="{{route('brands.show',[$brand->slug])}}">{{$brand->name}}</a></li>--}}

            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="nav-item"> <a href="{{route('home')}}" class="nav-link active">Frames</a></li>--}}
    {{--<li class="nav-item"> <a href="{{route('frame-brands')}}" class="nav-link ">Frame and Brand</a></li>--}}
    <li class="nav-item"> <a href="{{route('shop.index')}}" class="nav-link {{ (request()->segment(1) == 'shop') ? 'active' : '' }}">Shop Online</a></li>
   {{--l <li class="nav-item"> <a href="{{route('content.show',['contact-lens'])}}" class="nav-link ">Contact Lens</a></li>--}}
    <li class="nav-item"> <a href="{{route('contact-us.index')}}" class="nav-link {{ (request()->segment(1) == 'contact-us') ? 'active' : '' }}">Contact Us</a></li>

    {{--<li class="nav-item"> <a href="javascript:void(0)" class="nav-link ">More</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li class="nav-item"> <a href="{{route('content.show',['about-us'])}}" class="nav-link ">About Us</a></li>--}}
            {{--<li class="nav-item"> <a href="{{route('contact-us.index')}}" class="nav-link ">Contact Us</a></li>--}}

        {{--</ul>--}}

    {{--</li>--}}
    {{--<li class="nav-item"> <a href="{{route('package.index')}}" class="nav-link ">Packages</a></li>--}}
    {{--<li class="nav-item"><a href="javascript:void(0)" class="nav-link">Glasses</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--@foreach($glasses as $glass)--}}
            {{--<li class="nav-item"><a href="{{route('glass.show',[$glass->slug])}}" class="nav-link">{{$glass->name}}</a></li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="nav-item"><a href="javascript:void(0)" class="nav-link">Sunglasses</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--@foreach($brands as $brand)--}}
            {{--<li class="nav-item"><a href="{{route('sunglass.show',[$brand->slug])}}" class="nav-link">{{$brand->name}}</a></li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="nav-item"><a href="javascript:void(0)" class="nav-link">Designer</a>--}}

        {{--<ul class="sub-menu">--}}

            {{--@foreach($frames as $frame)--}}
                {{--@if($frame->category->isEmpty())--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frame.show',[$frame->slug])}}">{{$frame->name}}</a>--}}

                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="javascript:void(0)" class="nav-link">{{$frame->name}}--}}
                            {{--<i class="fa fa-angle-right fa-2x"></i>--}}
                        {{--</a>--}}

                        {{--<ul>--}}
                            {{--@foreach($frame->category as $category)--}}
                                {{--<li><a href='{{route('frame-category.show',[$category->slug])}}'>{{$category->name}}</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                {{--@endif--}}
                {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="nav-item"><a href="javascript:void(0)" class="nav-link">Lenses</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--@foreach($lenses as $lense)--}}
            {{--<li class="nav-item"><a href="{{route('lens.show',[$lense->slug])}}" class="nav-link">{{$lense->name}}</a></li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}

</ul>



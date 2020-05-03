<ul class="navbar-nav mr-auto desktop-menu" id="menu">

    <li class="nav-item"> <a href="{{route('home')}}" class="nav-link active">Home</a></li>
    @foreach($header as $content)
        @if($content->child->isEmpty() && $content->parent_id == '' )



            <li class="nav-item">
                <a href="{{route('content.show',[$content->slug])}}" class="nav-link">{{$content->title}}</a>
            </li>

        @else
            @if($content->child->isNotEmpty() && $content->parent_id == '' )
                <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>

                <li class="nav-item">
                    <a class="nav-link">{{$content->title}}
                        {{--<i class="fas fa-chevron-down "></i>--}}
                    </a>
                    <ul class="sub-menu">
                        {{--<li><a href="#">Trekking</a></li>--}}
                        @foreach($content->child as $firstchild)


                            <li class="nav-item"><a href="{{route('content.show',[$firstchild->slug])}}">{{$firstchild->title}}</a></li>


                        @endforeach
                        @if($content->slug =='company')
                            <li><a href="{{route('contact-us.index')}}">Contact Us</a></li>
                        @endif
                    </ul>
                </li>
            @endif
        @endif
    @endforeach

    {{--<li class="nav-item"> <a href="{{route('content.show',['about-us'])}}" class="nav-link ">About Us</a></li>--}}

    {{--<li class="nav-item"> <a href="{{route('service.index')}}" class="nav-link ">Services</a></li>--}}
    {{--<li class="nav-item"> <a href="{{route('content.show',['eye-care'])}}" class="nav-link ">Eye Care</a></li>--}}
    {{--<li class="nav-item"> <a href="javascript:void(0)" class="nav-link ">Frame and Brand</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--@foreach($brands as $brand)--}}
                {{--<li><a href="{{route('brands.show',[$brand->slug])}}">{{$brand->name}}</a></li>--}}

            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="nav-item"> <a href="{{route('home')}}" class="nav-link active">Frames</a></li>--}}
    {{--<li class="nav-item"> <a href="{{route('frame-brands')}}" class="nav-link ">Frame and Brand</a></li>--}}
    <li class="nav-item"> <a href="{{route('shop.index')}}" class="nav-link ">Shop</a></li>
   {{--l <li class="nav-item"> <a href="{{route('content.show',['contact-lens'])}}" class="nav-link ">Contact Lens</a></li>--}}
    <li class="nav-item"> <a href="{{route('contact-us.index')}}" class="nav-link ">Contact Us</a></li>

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



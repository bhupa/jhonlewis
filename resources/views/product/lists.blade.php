
<div class="card sidebar-menu mb-4">
    <div class="card-header">
        <h3 class="h4 card-title">Categories</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column category-menu">
            <li><a href="javscript:void(0)" class="nav-link active">Glasses <span class="badge badge-light">{{count($glasses)}}</span></a>
                <ul class="list-unstyled">
                    @foreach($glasses as $glass)
                    <li><a href="{{route('glass.show',[$glass->slug])}}" class="nav-link">{{$glass->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="javscript:void(0)" class="nav-link active">Sunglasses  <span class="badge badge-light">{{count($brands)}}</span></a>
                <ul class="list-unstyled">

                    @foreach($brands as $sunglass)
                        <li><a href="{{route('sunglass.show',[$glass->slug])}}" class="nav-link">{{$sunglass->name}}</a></li>
                        @endforeach

                </ul>
            </li>
            <li><a href="category.html" class="nav-link active">Lenses  <span class="badge badge-light">{{count($lenses)}}</span></a>
                <ul class="list-unstyled">

                    @foreach($lenses as $lens)
                        <li><a href="{{route('lens.show',[$lens->slug])}}" class="nav-link">{{$lens->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="category.html" class="nav-link active">Designer  <span class="badge badge-light">{{count($frames)}}</span></a>
                <ul class="list-unstyled">

                    @foreach($frames as $frame)
                        <li><a href="{{route('frame.show',[$frame->slug])}}" class="nav-link">{{$frame->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>

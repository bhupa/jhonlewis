
<li class="nav-item dropdown show">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{$totals}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right show">
        <span class="dropdown-item dropdown-header">{{$totals}} Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach($notifications as $notification)
            <div class="dropdown-divider"></div>
            <a href="{{$notification->url}}" class="dropdown-item">
                <i class="fa fa-plus mr-2"></i>{{$notification->order->total_item}}  has been ordered
                <span class="float-right text-muted text-sm">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans()}} </span>
            </a>
        @endforeach
        {{--        <div class="dropdown-divider"></div>--}}
        {{--        <a href="#" class="dropdown-item">--}}
        {{--            <i class="fa fa-plus mr-2"></i> 3 new reports--}}
        {{--            <span class="float-right text-muted text-sm">2 days</span>--}}
        {{--        </a>--}}
        {{--        <div class="dropdown-divider"></div>--}}
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link"  href="{{route('logout')}}"><i class="fas fa-lock"></i></a>
</li>

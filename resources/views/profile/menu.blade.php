<div class="card sidebar-menu">
    <div class="card-header">
        <h3 class="h4 card-title">Customer section</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column">
            <a href="{{route('appointment.lists')}}" class="nav-link "><i class="fa fa-hospital-o"></i> My appointments</a>
            <a href="{{route('order-lists.index')}}" class="nav-link"><i class="fa fa-list"></i> My orders</a>
            <a href="{{route('wishlist.index')}}" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a>
            <a href="{{route('getprofile')}}" class="nav-link"><i class="fa fa-user"></i> Settings</a>
            <a href="{{route('logout')}}" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></ul>
    </div>
</div>

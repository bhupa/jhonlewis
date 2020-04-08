<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

            <img src="{{asset('frontend/img/logosm.png')}}" style="width:120px !important; margin: 0 auto;" class="img-circle elevation-2" alt="User Image">
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="{{route('appointments.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-notes-medical"></i>
                    <p>
                        Appointment
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('schedules.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-calendar-check"></i>
                    <p>
                       Appointment Schedule
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('banners.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Banner
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Blog
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('blog_categories.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('blogs.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Blog
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('contacts.index')}}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        Contact
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('contents.index')}}" class="nav-link">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                        Content
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('discounts.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-tags"></i>
                    <p>
                        Discount
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('doctors.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-user-md"></i>
                    <p>
                        Doctor
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-eye-dropper"></i>
                    <p>
                        Order
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('packages.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Pacakages
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('products.index')}}" class="nav-link">
                    <i class="nav-icon fa fa-box"></i>
                    <p>
                        Product
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Product Category
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('frames.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Frame
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('frame-categories.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Frame-Category
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('glasses.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Glasses
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sunglasses.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                SunGlasses
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('lenses.index')}}" class="nav-link">
                            <i class="nav-icon far fa-file"></i>
                            <p>
                                Lenses
                            </p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('services.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-clinic-medical"></i>
                    <p>
                        Service
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('settings.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Setting
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('testimonials.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Testimonial
                    </p>
                </a>

            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                    </p>
                </a>

            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>John-Lewis-Opticians | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/jquery.dataTables.min.css')}}">
    {{--    <link rel="stylesheet" href="{{ asset('backend/dist/css/v')}}">--}}
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <rellink rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />

    @yield('css_script')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
{{--        <form class="form-inline ml-3">--}}
{{--            <div class="input-group input-group-sm">--}}
{{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-navbar" type="submit">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" id="notification-lists">
            @include('backend.notification')
            <!-- Messages Dropdown Menu -->

            <!-- Notifications Dropdown Menu -->


        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
            {{--                <img src="{{asset('frontend/img/nav-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                     style="opacity: .8">--}}
            <span class="brand-text font-weight-light">Jhon Lewis Opticians</span>
        </a>

        <!-- Sidebar -->
    @include('backend.sidebar')
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy;   {{date('Y')}} <a href="javascript:void(0)">Jhon Lewis Opticians</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">

        </div>
    </footer>
</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{ asset('backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/demo.js')}}"></script>
<script src="{{ asset('backend/dist/js/pages/dashboard3.js')}}"></script>


<script src="{{ asset('backend/dist/js/dataTables.bootstrap4.min.js')}}"></script>
{{--<script src="{{ asset('backend/dist/js/bootstrap-multiselect.min.js')}}"></script>--}}
{{--<script src="{{ asset('backend/dist/js/sb-admin-2.js/sb-admin-2.min.js')}}"></script>--}}
<script src="{{ asset('backend/dist/js/sweetalert2.all.min.js')}}"></script>


<script src="{{ asset('backend/dist/js/uploaders/dropzone.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/uploaders/dropzoneDemo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>
{{--<script src="https://js.pusher.com/5.1/pusher.min.js"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.js" integrity="sha256-lDaoGuONbVHFEV6ZW3GowBu4ECOTjDE14hleNVBvDW8=" crossorigin="anonymous"></script>


{{--<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>--}}

{{--<script src="{{ asset('/backend/js/echo.js') }}" type="text/javascript"></script>--}}
@yield('js_script');
<script type="application/javascript">
    var baseUrl = '{!! url('') !!}';


    // var socket = io.connect('http://127.0.0.1:8890');
 //    socket.on('my-channel:App\\Events\\Order\\NewOrder', function(data){
   //    alert(data);
     //})
    $(function() {
        //you define socket - you can use IP
        // var socket = io.connect('http://68.183.35.136:3000');
        // var socket = io.connect('http://127.0.0.1:3000');

        var socket = io.connect('http://127.0.0.1:3000');
            console.log(socket);

        socket.emit('login',{'email': "{{auth()->user()->email}}" })

        //you capture message data



        socket.on('notification-load', function(message){
            alert(message);
            $.ajax({
                type: "get",
                url: "{{ route('notifications.index') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (response) {
                    $('#notification-lists').html(response);
                },
                error: function (e) {
                    if (e.responseJSON.message) {
                        swal('Error', e.responseJSON.message, 'error');
                    } else {
                        swal('Error', 'Something went wrong while processing your request.', 'error')
                    }
                }
            });
        });
    });



    var editor_config = {
        path_absolute : baseUrl,
        selector: ".editor[name=description] ,.mini-editor[name=short_description]",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);

    $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#datepicker').attr('min', maxDate);
    });
    $(document).ready( function () {
        $('#table').DataTable();
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });


    });



</script>
</body>
</html>

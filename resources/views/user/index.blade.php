@extends('frontend.app')
@section('title','Profile')
@section('css_script')
@endsection
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Settings</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
                        *** CUSTOMER MENU ***
                        _________________________________________________________

                        <!-- /.col-lg-3-->
                        <!-- *** CUSTOMER MENU END ***-->
                        @include('profile.menu')
                    </div>
                    <div id="customer-order" class="col-lg-9">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

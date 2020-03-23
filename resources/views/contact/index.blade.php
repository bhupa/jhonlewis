@extends('frontend.app')
@section('title','Contact Us')
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        @include('shop.sidebar')
                    </div>
                    <div class="col-lg-9">
                        <div id="contact" class="box">
                            <h1>Contact</h1>
                            <p class="lead">Are you curious about something? Do you have some kind of problem with our products?</p>
                            <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3><i class="fa fa-map-marker"></i>Address</h3>
                                    <p>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p>
                                </div>
                                <!-- /.col-sm-4-->
                                <div class="col-md-4">
                                    <h3><i class="fa fa-phone"></i> Call center</h3>
                                    <p class="text-muted">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                                    <p><strong>+33 555 444 333</strong></p>
                                </div>
                                <!-- /.col-sm-4-->
                                <div class="col-md-4">
                                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                    <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                                    <ul>
                                        <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                                        <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                                    </ul>
                                </div>
                                <!-- /.col-sm-4-->
                            </div>
                            <!-- /.row-->
                            <hr>
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.899597181896!2d-0.14721708448404427!3d51.51505797963636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761baea0f3a41d%3A0xc2909456a3b503d1!2sJohn%20Lewis%20Opticians!5e0!3m2!1sen!2snp!4v1584927822572!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
{{--                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.15199596207!2d85.3121399!3d27.6774923!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa37c23d7800d7e30!2sSeto+Gurans+National+Child+Development+Services+(SGNCDS)!5e0!3m2!1sen!2snp!4v1560658311924!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>--}}
                            </div>
                            <hr>
                            <h2>Contact form</h2>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input id="firstname" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input id="lastname" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input id="subject" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
                                    </div>
                                </div>
                                <!-- /.row-->
                            </form>
                        </div>
                    </div>
                    <!-- /.col-md-9-->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
@endsection

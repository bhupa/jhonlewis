@extends('frontend.app')
@section('title','Profile-Setting')
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
                                <li aria-current="page" class="breadcrumb-item active">Setting</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        @include('profile.menu')
                    </div>
                    <div id="customer-order" class="col-lg-9">
                        <div class="box">
                            <h1>My account</h1>
                            <p class="lead">Change your personal details or your password here.</p>

                            <h3>Change password</h3>
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>

                            @endif
                            {{ Form::open(['route'=>'login.store']) }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password_old">Old password</label>
                                            <input type="password" name="old_password" class="form-control" id="password_old">
                                            @if ($errors->has('old_password'))
                                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password_1">New password</label>
                                            <input type="password" name="new_password" class="form-control" id="password_1">
                                            @if ($errors->has('new_password'))
                                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password_2">Retype new password</label>
                                            <input type="password" name="confirm" class="form-control" id="password_2">
                                            @if ($errors->has('confirm'))
                                                <span class="text-danger">{{ $errors->first('confirm') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                                </div>
                            {!! Form::close() !!}

                            <hr>

                            <h3>Personal details</h3>
                            {{Form::open(['route'=>'profile.store','enctype'=>   "multipart/form-data"])}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input type="text"  name="first_name" class="form-control" id="firstname" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text"  name="last_name" class="form-control" id="lastname" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">User Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Address</label>
                                            <input type="text" name="address" class="form-control" id="street" value="{{$user->address}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="city">Country</label>
                                            <input type="text" name="country" class="form-control" id="country" value="{{$user->country}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zip">State</label>
                                            <input type="text" name="state" class="form-control" id="state" value="{{$user->state}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zip">ZIP</label>
                                            <input type="text" name="zip_code" class="form-control" id="zip" value="{{$user->zip_code}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="state">Contact</label>
                                            <input type="text" name="contact" class="form-control" id="contact" value="{{$user->contact}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Image</label>
                                            <div class="yes">
    <span class="btn_upload">
      <input type="file" name="image"  id="imag4" title="" />
      Choose Image
      </span>
                                                @if(file_exists('storage/'.$user->image) && $user->image != '')
                                                    <img id="ImgPreview4" src="{{asset('storage/'.$user->image)}}" class="preview4 it" alt="{{$user->name}}"/>
                                                    <a href="" class="btn-rmv4" id="removeImage4">x</a>
                                                @else
                                                <img id="ImgPreview4" src="{{asset('backend/dist/img/placeholder.png')}}" class="preview4 it" />
{{--                                                <a href="" class="btn-rmv4" id="removeImage4">x</a>--}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

                                    </div>
                                </div>
                         {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_script')
    <script>
        $(document).ready( function () {
            function readURL(input, imgControlName) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(imgControlName).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imag4").change(function() {
                // add your logic to decide which image control you'll use
                var imgControlName = "#ImgPreview4";
                readURL(this, imgControlName);
                $('.preview4').addClass('it');
                $('.btn-rmv4').addClass('rmv');
            });
            $("#removeImage4").click(function(e) {
                e.preventDefault();
                $("#imag4").val("");
                $("#ImgPreview4").attr("src", "");
                $('.preview4').removeClass('it');
                $('.btn-rmv4').removeClass('rmv');
            });
        });
        </script>
@endsection

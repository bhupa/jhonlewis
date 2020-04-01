@extends('backend.app')
@section('title','Edit-Frames')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('frame-categories.index')}}"> View Frame Category </a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Frames </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::model($frames,['route'=>['frame-categories.update',$frames->id],'class'=>'needs-validation','method'=>'PUT','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="value" class="form-control" name="name" placeholder="Enter Title" value="{{$frames->name}}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Category</label>
                                        <select name="frame_id" class="form-control">

                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == $frames->frame_id) selected="selected" @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('frame_id'))
                                            <span class="text-danger">{{ $errors->first('frame_id') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{Form::hidden('id',$frames->id)}}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


@endsection
@section('js_script')
    <script>
        $(document).ready( function () {
            $('#upload-image').on('change',function(){

                readImgUrlAndPreview(this);
                function readImgUrlAndPreview(input){
                    $('#edit-logo-output').css('display','none');
                    $('.edit-delete-img').css('display','block');
                    $('#output').css('display','block');
                    $('.cover').css('display','block');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#output').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            })

            $('#clear-image').on('click',function(){
                $('#edit-logo-output').css('display','block');;
                $('.edit-delete-img').css('display','none');
                $('#output').css('display','none');


            })


        });
    </script>
@endsection

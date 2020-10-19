@extends('admin.master')

@section('title')

    <title>Edit Brand</title>

@endsection


@section('body')

    <div class="container">
        <div class="row">
            <div class="add-category col-lg-10 offset-1" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Edit Brand</h5>
                    @if(Session::has('message'))
                        <div class="alert alert-dismissible">
                            <h5 class="bg-success text-center">{{session('message')}}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times</span>
                                </button>
                            </h5>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('/update-brand')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Brand Name:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control">

                                        <span class="text-danger">{{$errors->has('brand_name')?$errors->first('brand_name'):''}}</span>
                                        <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="description">Brand Description:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea name="brand_description" id="" cols="30" rows="3" class="form-control">{{$brand->brand_description}}</textarea>
                                        <span class="text-danger">{{$errors->has('brand_description')?$errors->first('brand_description'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Publication Status:</label>
                                    </div>
                                    <div class="col-lg-8">
                                    <span style="display: block;">
                                        <input type="radio" id="publication_status" name="publication_status" value="1" checked class="custom-radio"><label for="publication_status">Published</label>
                                    </span>
                                        <span>
                                        <input type="radio" id="unpublication_status" name="publication_status" value="0" class="custom-radio"><label for="unpublication_status">Unpublished</label>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 offset-4">

                                    <input type="submit" value="Update Brand Info" class="form-control btn btn-info">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

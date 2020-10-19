@extends('admin.master')

@section('title')

    <title>Add Product</title>

@endsection


@section('body')

    <div class="container">
        <div class="row">
            <div class="add-category col-lg-10 offset-1" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Add Product</h5>
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
                        <form action="{{route('/save-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Category Name:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select name="category_name" id="category-name" class="form-control">
                                            <option>---------------Select Product Category---------------</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('category_name')?$errors->first('category_name'):''}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Brand Name:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select name="brand_name" id="brand-name" class="form-control">
                                            <option>---------------Select Product Brand---------------</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('brand_name')?$errors->first('brand_name'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Product Name:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="product_name" class="form-control">
                                        <span class="text-danger">{{$errors->has('product_name')?$errors->first('product_name'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Product Price:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="number" name="product_price" class="form-control">
                                        <span class="text-danger">{{$errors->has('product_price')?$errors->first('product_price'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Product Quantity:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="number" name="product_quantity" class="form-control">
                                        <span class="text-danger">{{$errors->has('product_quantity')?$errors->first('product_quantity'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="description">Short Description:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea name="short_description" id="" cols="30" rows="3" class="form-control"></textarea>
                                        <span class="text-danger">{{$errors->has('short_description')?$errors->first('short_description'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="description">Brief Description:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea name="long_description" id="" cols="30" rows="5" class="form-control"></textarea>
                                        <span class="text-danger">{{$errors->has('long_description')?$errors->first('long_description'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name">Product Image:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="file" name="product_image">
                                        <span class="text-danger">{{$errors->has('product_image')?$errors->first('product_image'):''}}</span>
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

                                    <input type="submit" value="Save Product Info" class="form-control btn btn-info">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

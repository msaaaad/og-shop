@extends('admin.master')

@section('title')

    <title>Manage Product</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Manage Product</h4>
                        @if(Session::has('message'))
                            <div class="alert alert-dismissible">
                                <h5 class="bg-success text-center">{{session('message')}}
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span>&times</span>
                                    </button>
                                </h5>
                            </div>
                        @endif
                    </div>
                    @php($i=1)
                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Sl. No</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Short Description</th>
                                <th>Brief Description</th>
                                <th>Product Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($products as $product)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->category_name}}</td>
                                    <td>{{$product->brand_name}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->long_description}}</td>
                                    <td><img src="{{$product->product_image}}" style="height:40px;width: 50px;" alt="{{$product->product_image}}"></td>
                                    <td>{{$product->publication_status==1?'published':'unpublished'}}</td>
                                    <td>
                                        <a href="{{route('/delete-product',['id'=>$product->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        <a href="{{route('/edit-product',['id'=>$product->id])}}" class="btn btn-success btn-sm"><i class=" fab fa-chromecast"></i></a>
                                        @if($product->publication_status==1)
                                            <a href="{{route('/unpublish-product',['id'=>$product->id])}}" class="btn btn-info btn-sm"><i class="fas fa-arrow-up"></i></a>
                                        @else
                                            <a href="{{route('/publish-product',['id'=>$product->id])}}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-down"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

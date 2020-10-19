@extends('admin.master')

@section('title')

    <title>Manage Category</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Manage Category</h4>
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
                        <table class="table table-bordered">
                            <tr>
                                <th>Sl. No</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->publication_status==1?'published':'unpublished'}}</td>
                                <td>
                                    <a href="{{route('/category-delete',['id'=>$category->id])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{route('/edit-category',['id'=>$category->id])}}" class="btn btn-success btn-sm"><i class=" fab fa-chromecast"></i></a>
                                    @if($category->publication_status==1)
                                    <a href="{{route('/unpublish-category',['id'=>$category->id])}}" class="btn btn-info btn-sm"><i class="fas fa-arrow-up"></i></a>
                                    @else
                                    <a href="{{route('/publish-category',['id'=>$category->id])}}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-down"></i></a>
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

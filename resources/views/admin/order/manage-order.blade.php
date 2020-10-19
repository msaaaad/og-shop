@extends('admin.master')

@section('title')

    <title>Manage Order</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Manage Order</h4>
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
                            <tr class="bg-gradient-light">
                                <th>Sl. No</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->first_name.' '.$order->last_name}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_type}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('view-order',['id'=>$order->id])}}" class="btn btn-info btn-sm" title="View Order Details"><i class="fas fa-search-plus"></i></a>
                                    <a href="{{route('order-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-sm" title="View Order Invoice"><i class=" fas fa-search-minus"></i></a>
                                    <a href="{{route('download-order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" title="Download Order Invoice"><i class=" fas fa-download"></i></a>
                                    <a href="" class="btn btn-success btn-sm" title="Edit Order"><i class=" fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="Delete Order"><i class=" fas fa-trash"></i></a>

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

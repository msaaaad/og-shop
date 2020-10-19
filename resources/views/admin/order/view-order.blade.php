@extends('admin.master')

@section('title')

    <title>Manage Order</title>

@endsection

@section('body')

<div class="order-details col-8 offset-1">
    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Customer For This Order Order</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <tr>
                               <th>Customer Name</th>
                               <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                           </tr>
                           <tr>
                               <th>Phone Number</th>
                               <td>{{$customer->phone_number}}</td>
                           </tr>
                           <tr>
                               <th>Email Address</th>
                               <td>{{$customer->email_address}}</td>
                           </tr>
                           <tr>
                               <th>Address</th>
                               <td>{{$customer->address}}</td>
                           </tr>

                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Order Details For This Order Order</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <tr>
                               <th>Order No.</th>
                               <td>{{$order->id}}</td>
                           </tr>
                           <tr>
                               <th>Order Total</th>
                               <td>{{$order->order_total}}</td>
                           </tr>
                           <tr>
                               <th>Order Status</th>
                               <td>{{$order->order_status}}</td>
                           </tr>
                           <tr>
                               <th>Order Date</th>
                               <td>{{$order->created_at}}</td>
                           </tr>

                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Shipping Info For This Order Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td>{{$shipping->full_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{$shipping->phone_number}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$shipping->email_address}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$shipping->address}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Payment Info For This Order Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$payment->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$payment->payment_status}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="manage-category col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-warning text-center">Product Info For This Order Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Sl No.</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total Product Price</th>
                            </tr>
                            @php($i=1)
                            @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$orderDetail->product_id}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_quantity}}</td>
                                <td>{{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

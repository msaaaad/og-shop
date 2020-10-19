@extends('front-end.master')
@section('title')

    <title>Cart</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="add-category col-lg-12" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">My Shopping Cart</h5>
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

                        <table class="table table-bordered table-responsive">
                            <tr class="text-center bg-primary">
                                <td>SL. No</td>
                                <td>Name</td>
                                <td>Product Image</td>
                                <td>Price TK.</td>
                                <td>Quantity</td>
                                <td>Total Price TK.</td>
                                <td>Action</td>
                            </tr>
                            @php($i=1)
                            @php($sum = 0)
                            @foreach($cartProducts as $cartProduct)
                            <tr>

                                <td>{{$i++}}</td>
                                <td>{{$cartProduct->name}}</td>
                                <td style="height: 80px;width: 100px;"><img style="height: 100%;width: 100%;" src="{{asset($cartProduct->attributes->image)}}" alt=""></td>
                                <td>TK. {{$cartProduct->price}}</td>
                                <td>

                                    <form action="{{route('update-cart')}}" method="POST">
                                        <input type="number" name="quantity" value="{{$cartProduct->quantity}}" min="1">
                                        <input type="hidden" value="{{$cartProduct->id}}" name="id">
                                        <input type="submit" name="mbtn" value="Update">
                                    </form>

                                </td>
                                <td>TK. {{$total=$cartProduct->price*$cartProduct->quantity}}</td>
                                <td>
                                    <a href="{{route('delete-cart-item',['id'=>$cartProduct->id])}}" title="Delete" class="btn btn-danger">
                                        <span class="fas fab far fa-trash"></span>
                                    </a>
                                </td>
                            </tr>

                             <?php $sum=$sum+$total;?>
                            @endforeach
                        </table>
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total(TK.)</th>
                                <td>{{$sum}}</td>
                            </tr>
                            <tr>
                                <th>Vat Total(TK.)</th>
                                <td>{{$vat=$sum*(10/100)}}</td>
                            </tr>
                            <tr>
                                <th>Grand Total(TK.)</th>
                                <td>{{$orderTotal=$sum+$vat}}</td>
                                <?php
                                Session::put('orderTotal',$orderTotal);
                                ?>
                            </tr>
                        </table>

                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::get('customerId') && Session::get('shippingId'))
                            <a href="{{route('checkout-payment')}}" class="btn btn-success pull-right">Checkout</a>
                            @elseif(Session::get('customerId'))
                                <a href="{{route('checkout-shipping')}}" class="btn btn-success pull-right">Checkout</a>
                            @else
                                <a href="{{route('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                                @endif
                            <a href="{{route('/')}}" class="btn btn-info">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


@endsection


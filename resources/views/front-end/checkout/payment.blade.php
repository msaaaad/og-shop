@extends('front-end.master')
@section('title')

    <title>Cart</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="col-12 bg-warning">
                <p class="text-center text-capitalize text-dark" style="font-weight: 700;">dear {{Session::get('customerName')}}...you have to give us product payment info to complete your valuable order</p>

            </div>
            <div class=" col-lg-8 offset-2" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Payment Info Goes Here...</h5>
                    <div class="card-body">
                        <form action="{{route('new-order')}}" method="POST">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Cash On Delivery</th>
                                    <td><input id="cash" type="radio" name="payment_type" value="Cash"><label for="cash">Cash On Delivery</label></td>
                                </tr>
                                <tr>
                                    <th>Rocket</th>
                                    <td><input id="rocket" type="radio" name="payment_type" value="Rocket"><label
                                            for="rocket">Rocket</label></td>
                                </tr>
                                <tr>
                                    <th>Bkash</th>
                                    <td><input type="radio" id="bkash" name="payment_type" value="Bkash"><label
                                            for="bkash">Bkash</label></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><input type="submit" value="Confirm Order" name="btn"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


@endsection


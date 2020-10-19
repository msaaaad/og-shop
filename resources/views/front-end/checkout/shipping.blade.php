@extends('front-end.master')
@section('title')

    <title>Cart</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="col-12 bg-warning">
                <p class="text-center text-capitalize text-dark" style="font-weight: 700;">dear {{Session::get('customerName')}}...you have to give us product shipping info to complete your valuable order</p>
                <p class="text-center text-capitalize text-success" style="font-weight: 700;">if your billing info and shipping info are same then just press save shipping info button</p>
            </div>
            <div class=" col-lg-8 offset-2" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Shipping Info Goes Here...</h5>
                    <div class="card-body">
                        <form action="{{route('new-shipping')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{$customer->first_name.' '.$customer->last_name}}" name="full_name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email_address" value="{{$customer->email_address}}" placeholder="example@email.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="phone_number"  type="text" value="{{$customer->phone_number}}" placeholder="Phone Number" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address" class="form-control" id="" cols="30" rows="5">{{$customer->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <input name="btn" type="submit" value="Save Shipping Info" class="form-control btn btn-warning">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


@endsection


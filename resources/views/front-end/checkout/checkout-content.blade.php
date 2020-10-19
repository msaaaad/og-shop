@extends('front-end.master')
@section('title')

    <title>Cart</title>

@endsection

@section('body')


    <div class="container">
        <div class="row">
            <div class="col-12 bg-warning">
                <p class="text-center text-capitalize text-dark" style="font-weight: 700;">You have to login to complete your valuable order.If you are not registered then please register first</p>
            </div>
            <div class=" col-lg-6" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Registration Form</h5>
                    <div class="card-body">

                        <form action="{{route('customer-sign-up')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="first_name" placeholder="First Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <input type="email" id="email_address" name="email_address" placeholder="example@email.com" class="form-control">
                                <span class="text-danger">{{$errors->has('email_address')?$errors->first('email_address'):''}}</span>
                                <span class="text-warning" id="res"></span>

                            </div>
                            <div class="form-group">
                                <input name="password" placeholder="password***"  type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="phone_number"  type="text" placeholder="Phone Number" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <input name="btn" type="submit" value="Register" id="regBtn" class="form-control btn btn-warning">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="margin-top: 50px;">
                <div class="card">
                    <h5 class="card-header text-success text-center">Already registered!Log in Now</h5>
                    @if(Session::has('message'))
                        <div class="alert alert-dismissible">
                            <h5 class="text-danger text-center">{{session('message')}}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times</span>
                                </button>
                            </h5>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('customer-log-in')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email_address" placeholder="example@email.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password***" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Log In" name="btn" class="form-control btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <script>
       var email_address= document.getElementById('email_address');
       email_address.onblur = function (){
           var email = document.getElementById('email_address').value;

           var xmlHttp = new XMLHttpRequest();
           var serverPage = 'http://localhost/ecom/public/ajax-email-check/'+email;
           xmlHttp.open('GET',serverPage);
           xmlHttp.onreadystatechange = function(){
               // alert(xmlHttp.readyState);
               if(xmlHttp.readyState==4 && xmlHttp.status == 200){
                   document.getElementById('res').innerHTML = xmlHttp.responseText;
                   if (xmlHttp.responseText == 'Already Exists') {
                    document.getElementById('regBtn').disabled = true;
                   }
                   else{

                    document.getElementById('regBtn').disabled = false;
                   }
               }
           }
           xmlHttp.send(null);

       }
    </script>
@endsection


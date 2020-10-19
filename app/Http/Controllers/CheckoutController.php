<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Mail;

class CheckoutController extends Controller
{


    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    public function customerSignUp(Request $request){

        $this->validate($request,[
            'email_address' =>'email|unique:customers,email_address'
        ]);
        $customer=new Customer();
        $customer->first_name       =$request->first_name;
        $customer->last_name        =$request->last_name;
        $customer->email_address    =$request->email_address;
        $customer->password         =bcrypt($request->password);
        $customer->phone_number     =$request->phone_number;
        $customer->address          =$request->address;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $data=$customer->toArray();


        Mail::send('front-end.mails.confermation-mail',$data,function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('confermation-mail');
        });


        return redirect('/checkout/shipping');
    }


    public function customerLogin(Request $request){
        $customer=Customer::where('email_address', $request->email_address)->first();

        if (password_verify($request->password,$customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);
            return redirect('/checkout/shipping');
        }
        else{
            return redirect('/checkout')->with('message','Your email address OR password did not matched.Please enter a valid email address OR password');
        }
    }


    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }

    public function visitorLogin(Request $request){
        $customer=Customer::where('email_address', $request->email_address)->first();

        if (password_verify($request->password,$customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);
            return redirect('/');
        }
        else{
            return redirect('/newcustomer/login')->with('message','Your email address OR password did not matched.Please enter a valid email address OR password');
        }
    }


    public function shippingForm(){
        $customer=Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }

    public function saveShippingInfo(Request $request){
        $shipping=new Shipping();
        $shipping->full_name        =$request->full_name;
        $shipping->email_address    =$request->email_address;
        $shipping->phone_number     =$request->phone_number;
        $shipping->address    =$request->address;
        $shipping->save();
        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }


    public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        if ($paymentType=='Cash'){
            $order=new Order();
            $order->customer_id     = Session::get('customerId');
            $order->shipping_id     = Session::get('shippingId');
            $order->order_total     = Session::get('orderTotal');
            $order->save();

            $payment=new Payment();
            $payment->order_id      =$order->id;
            $payment->payment_type  =$paymentType;
            $payment->save();

            $cartProducts=Cart::getContent();
            foreach ($cartProducts as $cartProduct){
                $orderDetail=new OrderDetail();
                $orderDetail->order_id      =$order->id;
                $orderDetail->product_id    =$cartProduct->id;
                $orderDetail->product_name  =$cartProduct->name;
                $orderDetail->product_price =$cartProduct->price;
                $orderDetail->product_quantity=$cartProduct->quantity;
                $orderDetail->save();
            }
            Cart::clear();
            return redirect('/complete/order');
        }
        else if ($paymentType=='Rocket'){

        }
        else if ($paymentType=='Bkash'){

        }

    }

    public function completeOrder(){
        return redirect('/');
    }

    public function userLogOut(){
        Auth::logout();
        return redirect('/login');
    }

    public function ajaxEmailCheck($a){
        $customer = Customer::where('email_address',$a)->first();
        if ($customer) {
            echo "Already Exists";
        }
        else
        {
            echo "Available";
        }

    }





















}

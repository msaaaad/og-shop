<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopController extends Controller
{
    public function shopGrid(){
        return view('front-end.shop.shop-grid');
    }
}

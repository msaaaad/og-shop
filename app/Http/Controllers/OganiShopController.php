<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OganiShopController extends Controller
{

    public function index(){
        $newProducts=Product::where('publication_status',1)
            ->orderBy('id','DESC')
            ->take(8)
            ->skip(1)
            ->get();
        return view('front-end.home.home',['newProducts'=>$newProducts]);
    }

    public function categoryProduct($id){
        $categoryProducts=Product::where('category_name',$id)
            ->where('publication_status',1)
            ->get();
        return view('front-end.category.category-content',['categoryProducts'=>$categoryProducts]);
    }

    public function productDetails($id){
        $productDetails=Product::find($id);
        return view('front-end.product.product-details',['productDetails'=>$productDetails]);
    }


    public function shopGrid(){
        return view('front-end.shop.shop-grid');
    }
}

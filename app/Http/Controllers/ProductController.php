<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function validation(Request $request){
        $request->validate([
            'category_name'        =>'required',
            'brand_name'           =>'required',
            'product_name'         =>'required',
            'product_price'        =>'required',
            'product_quantity'     =>'required',
            'short_description'    =>'required',
            'long_description'     =>'required',
            'product_image'        =>'required',
        ]);
    }

    public function addProduct(){
        $categories=Category::get();
        $brands=Brand::get();
        return view('admin.product.add-product',['categories'=>$categories,'brands'=>$brands]);
    }

    public function productImageUpload($request){

        $productImage=$request->file('product_image');
        $imageName=$productImage->getClientOriginalName();
        $directory='product-image/';
        $imageUrl=$directory.$imageName;
        $productImage->move($directory,$imageName);
        return $imageUrl;

    }

    public function productBasicInfo($request, $imageUrl){
        $product=new Product();

        $product->category_name             =$request->category_name;
        $product->brand_name                =$request->brand_name;
        $product->product_name              =$request->product_name;
        $product->product_price             =$request->product_price;
        $product->product_quantity          =$request->product_quantity;
        $product->short_description         =$request->short_description;
        $product->long_description          =$request->long_description;
        $product->product_image             =$imageUrl;
        $product->publication_status        =$request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request){
        $validateData=$this->validation($request);
        $imageUrl=$this->productImageUpload($request);
        $this->productBasicInfo($request,$imageUrl);
        return redirect('add-product')->with('message','Product Info Added Successfully');
    }


    public function manageProduct(){
        $products=Product::get();

        return view('admin.product.manage-product',['products'=>$products]);
    }

    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        return redirect('manage-product')->with('message','Product Info Deleted');
    }
    public function unpublishProduct($id){
        $product=Product::find($id);
        $product->publication_status=0;
        $product->save();
        return redirect('manage-product')->with('message','Product Info Unpublished');

    }

    public function publishProduct($id){
        $product=Product::find($id);
        $product->publication_status=1;
        $product->save();
        return redirect('manage-product')->with('message','Product Info Published');
    }

    public function editProduct($id){
        $product=Product::find($id);
        $categories=Category::get();
        $brands=Brand::get();
        return view('admin.product.edit-product',['product'=>$product,'categories'=>$categories,'brands'=>$brands]);
    }

    public function productBasicInfoUpdate($product,$request,$imageUrl){

        $product->category_name             =$request->category_name;
        $product->brand_name                =$request->brand_name;
        $product->product_name              =$request->product_name;
        $product->product_price             =$request->product_price;
        $product->product_quantity          =$request->product_quantity;
        $product->short_description         =$request->short_description;
        $product->long_description          =$request->long_description;
        $product->product_image             =$imageUrl;
        $product->publication_status        =$request->publication_status;
        $product->save();


    }

    public function updateProduct(Request $request){
        $product=Product::find($request->product_id);
        $validateData=$this->validation($request);
        $productImage=$request->file('product_image');
        if ($productImage) {
            unlink($product->product_image);
            $imageUrl = $this->productImageUpload($request);
            $this->productBasicInfoUpdate($product,$request, $imageUrl);
        }
        else{
            $this->productBasicInfoUpdate($product,$request);
        }

        return redirect('manage-product')->with('message', 'Product Info Updated Successfully');

    }

}

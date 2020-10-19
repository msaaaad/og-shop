<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function manageBrand(){
        $brands=Brand::get();
        return view('admin.brand.manage-brand',['brands'=>$brands]);
    }
    public function validation(Request $request){

        $validateData=$request->validate([
            'brand_name'        =>'required|max:20',
            'brand_description' =>'required|min:15',
        ]);
    }

    public function saveBrand(Request $request){
        $brand=new Brand();
        $validateData=$this->validation($request);

        $brand->brand_name              =$request->brand_name;
        $brand->brand_description       =$request->brand_description;
        $brand->publication_status      =$request->publication_status;
        $brand->save();
        return redirect('add-brand')->with('message','Brand Info Added');

    }


    public function deleteBrand($id){
        $brand=Brand::find($id);
        $brand->delete();
        return redirect('manage-brand')->with('message','Brand Info Deleted');

    }


    public function unpublishBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=0;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand Info Unpublished');
    }

    public function publishBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=1;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand Info Published');
    }

    public function editBrand($id){
        $brand=Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }
    public function updateBrand(Request $request){
        $brand=Brand::find($request->brand_id);

        $validateData=$this->validation($request);
        $brand->brand_name              =$request->brand_name;
        $brand->brand_description       =$request->brand_description;
        $brand->publication_status      =$request->publication_status;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand Info Updated');

    }

}

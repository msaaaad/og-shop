<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function validation(Request $request){

        $validateData=$request->validate([
            'category_name'        =>'required|max:20',
            'category_description' =>'required|min:15',
        ]);
    }

    public function saveCategory(Request $request){
        $categories=new Category();
        $validateData=$this->validation($request);
        $categories->category_name          =$request->category_name;
        $categories->category_description   =$request->category_description;
        $categories->publication_status     =$request->publication_status;

        $categories->save();
        return redirect('add-category')->with('message','Category Info Added Succssfully');
    }


    public function manageCategory(){
        $categories=Category::get();
        return view('admin.category.manage-category',['categories'=>$categories]);
    }


    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();

        return redirect('manage-category')->with('message','Category Info Deleted');

    }

    public function unpublishCategory($id){
        $category=Category::find($id);
        $category->publication_status=0;
        $category->save();
        return redirect('manage-category')->with('message','Category Info Unpublished');

    }

    public function publishCategory($id){
        $category=Category::find($id);
        $category->publication_status=1;
        $category->save();
        return redirect('manage-category')->with('message','Category Info Published');

    }

    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);
    }


    public function updateCategory(Request $request){
        $category=Category::find($request->category_id);
        $validateData=$this->validation($request);
        $category->category_name            =$request->category_name;
        $category->category_description     =$request->category_description;
        $category->publication_status       =$request->publication_status;
        $category->save();
        return redirect('manage-category')->with('message','Category Info Updated');

    }





}

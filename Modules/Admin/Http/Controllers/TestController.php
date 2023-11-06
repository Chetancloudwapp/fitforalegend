<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Category;
use Session;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TestController extends Controller
{
    use ValidatesRequests;

    // public function index()
    // {
    //     Session::put('page', 'Categories');
    //     $categories = Category::with('parentcategory')->get()->toArray();
    //     return view('admin::category.categories')->with(compact('categories'));
    // }

    // public function show($id)
    // {
    //     return view('admin::show');
    // }

   
    // Add Category Code
    // public function addEditCategory(Request $request, $id=null)
    // {
    //     Session::put('page', 'Categories');
    //     $getCategories = Category::getCategories();
    //     if($id==""){
    //         // Add Category
    //         $title = "Add Category";
    //         $category = new Category;
    //         $message = "Category Added Successfully!";
    //     }else{
    //         // Edit Category
    //         $title = "Edit Category";
    //         $category = Category::find($id);
    //         $message = "Category Updated Successfully!";
    //     }
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;

    //         $rules = [
    //             'category_name' => 'required',
    //         ];

    //         $customMessages = [
    //             'category_name.required' => 'Category Name is required',
    //         ];

    //         $this->validate($request, $rules, $customMessages);

    //         $category->category_name = $data['category_name'];
    //         $category->parent_id = $data['parent_id'];
    //         $category->description = $data['description'];
    //         // $category->url = $data['url'];
    //         // $category->meta_title = $data['meta_title'];
    //         // $category->meta_description = $data['meta_description'];
    //         // $category->meta_keywords = $data['meta_keywords'];
    //         $category->status = 1;
    //         if ($request->hasFile('category_image')) {
    //             $random_no  = uniqid();
    //             $img        = $request->file('category_image');
    //             $mime_type  =  $img->getMimeType();
    //             $ext        = $img->getClientOriginalExtension();
    //             $new_name   = $random_no . '.' . $ext;
    //             $destinationPath =  public_path('uploads/categories');
    //             $img->move($destinationPath, $new_name);
    //             $category->category_image = $new_name;
    //         }

    //         $category->save();
    //         return redirect('admin/categories')->with('success_message', $message);
    //     }
    //     return view('admin::category.add_categories')->with(compact('title', 'getCategories','category'));
    // }

    // public function destroy($id)
    // {
    //     Session::put('page', 'Categories');
    //     Category::where('id', $id)->delete();
    //     return redirect()->back()->with('success_message', 'Category Deleted Successfully');
    // }
}

<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Subcategory;
use Modules\Admin\Entities\ChildCategory;
use Session;
use Validator;
use DB;
use Image;

class CategoryController extends Controller
{
    use ValidatesRequests;

    // category Index
    public function index()
    {
        $categories = Categories::where('status', 'Active')
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'desc')
                        ->get();
        return view('admin::category.index')->with(compact('categories'));
    }
    
    // Add Category
    public function addEditCategory(Request $request, $id="")
    {
        if($id==""){
            // Add Category
            $title = "Add Category";
            $category = new Categories;
            $message = "Category Added Successfully!";
        }else{
            $title = "Edit Category";
            $category = Categories::find($id);
            $message = "Category Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required|regex:/^[^\d]+$/|min:2|max:255';
            }
            else{
                $req_fields['name']   = 'required|unique:category|regex:/^[^\d]+$/|min:2|max:255';
                $req_fields['image']  = 'mimes:jpeg,jpg,png,gif|required|max:10000';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                // 'name.regex'    => 'Valid name is required',
                'image.required' => 'Image is required',
                'image.mimes'   =>  'Valid image is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

            // $this->validate($request, $rules, $customMessages);

            // Upload Brands Image
            if($request->hasFile('image')){
            $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = public_path('uploads/categories/'.$imageName);
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $category->image = $imageName;
            $category->name   = $data['name'];
            $category->status = $data['status'];
            $category->save();
            return redirect('admin/category')->with('success_message', $message);
        }
        return view('admin::category.addCategory')->with(compact('title','category'));
    }

    /* --- Delete Category--- */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        Subcategory::where('cat_id', $id)->delete();
        ChildCategory::where('cat_id', $id)->delete();

        $categories_image_path = public_path('uploads/categories/');
        if(file_exists($categories_image_path.$category->image)){
            unlink($categories_image_path.$products->image);
        }
        $category->delete();
        return redirect()->back()->with('success_message', 'Category Deleted Successfully!');
    }

     // Subcategory Index
    public function subcategoryindex()
    {    
        $subcategory = Subcategory::select('subcategories.*','category.name as cat_name')  
                        ->join('category', 'category.id', '=', 'subcategories.cat_id')
                        ->orderBy('id','desc')
                        ->where('subcategories.status', 'Active')
                        ->whereNull('subcategories.deleted_at')
                        ->get();
        return view('admin::category.subcat_index')->with(compact('subcategory'));
    }

     // Add Subcategory
    public function subCategory(Request $request, $id="")
    {
        $get_parent_category = Categories::where('status', 'Active')->whereNull('deleted_at')->get();
        if($id==""){
            $title = "Add Sub Category";
            $subcategory = new Subcategory;
            $message = "Sub Category Added Successfully!";
        }else{
            $title = "Edit Sub Category";
            $subcategory = Subcategory::find($id);
            $message = "Sub Category Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'name' => 'required|unique:subcategories|regex:/^[^\d]+$/|min:2|max:255',
                'parent_id' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Name is required',
                // 'name.regex' => 'Valid name is required',
                'parent_id.required' => 'Category is required',
            ];

            $validation = Validator::make($request->all(), $rules, $customMessages);
            if($validation->fails()){
                return back()->withErrors($validation)->withInput();
            }

            // $this->validate($request, $rules, $customMessages);
            
            $subcategory->name = $data['name'];
            $subcategory->cat_id = $data['parent_id'];
            $subcategory->status = $data['status'];
            $subcategory->save();
            return redirect('admin/subcategory')->with('success_message', $message);
        }
        return view('admin::category.addsubcat')->with(compact('title','subcategory', 'get_parent_category'));
    }

    /* ----CHILD CATEGORY INDEX---  */
    public function childcategoryindex()
    {
        $ChildCategory = ChildCategory::select('childcategories.*', 'subcategories.name as subcat_name', 'category.name as cat_name')
                         ->join('subcategories', 'subcategories.id', '=', 'childcategories.subcategories_id')
                         ->join('category', 'category.id', '=', 'childcategories.cat_id')
                         ->orderBy('id', 'desc')
                         ->where('childcategories.status', 'Active')
                         ->whereNull('childcategories.deleted_at')
                         ->get();
        return view('admin::category.childcat_index')->with(compact('ChildCategory'));
    }

    /* ----Add CHILD CATEGORY---  */

    public function addChildCategory(Request $request, $id="")
    {
        // $ChildCategory = ChildCategory::find($id);
        $get_parent_category = Categories::where('status', 'Active')->whereNull('deleted_at')->get();
        // $get_sub_category = Subcategory::where('status', 'Active')->whereIn('cat_id', [$ChildCategory->cat_id])->get();
        $get_sub_category = Subcategory::where('status', 'Active')->whereNull('deleted_at')->get();
        // $get_sub_category = Subcategory::select('subcategories.*', 'subcategories.name as subcat_name')
        // ->join('childcategories', 'childcategories.cat_id', '=', 'subcategories.cat_id')
        // ->get();
        // dd($get_sub_category);
        if($id==""){
            // return "hello form childcategory";
            $title = "Add Child Category";
            $ChildCategory = new ChildCategory;
            $message = "Child Category Added Successfully!";
        }else{
            // dd('hello');
            $title = "Edit Child Category";
            $ChildCategory = ChildCategory::find($id);
            $message = "Child Category Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;
            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']      = 'required|min:2|max:255';
                $req_fields['parent_category'] = 'required';
                $req_fields['subcategory_id']  =  'required';
            }
            else{
                $req_fields['name']   = 'required|unique:childcategories|regex:/^[^\d]+$/|min:2|max:255';
                $req_fields['parent_category'] = 'required';
                $req_fields['subcategory_id'] = 'required';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'    => 'The category name does not contain numbers',
                'parent_category.required' => 'Parent Category is required',
                'subcategory_id.required' => 'Sub Category is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

            // $this->validate($request, $rules, $customMessages);
            $ChildCategory->name = $data['name'];
            $ChildCategory->cat_id = $data['parent_category'];
            $ChildCategory->subcategories_id = $data['subcategory_id'];
            $ChildCategory->save();
            return redirect('admin/childcategory')->with('success_message', $message);
        }
        return view('admin::category.addchildcat')->with(compact('title','ChildCategory', 'get_sub_category', 'get_parent_category'));
    }

    /* --- Delete Child Category ---*/
    public function delete_childcategories($id)
    {
        ChildCategory::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Child Category Deleted Successfully!');
    }

    /* --- Delete sub Category */
    public function delete_subcategories($id)
    {
        $subcategories = Subcategory::findOrFail($id);
        ChildCategory::where('subcategories_id', $id)->delete();
        $subcategories->delete();
        return redirect()->back()->with('success_message', 'Sub Category Deleted Successfully!');

    }

    public function getSubcategories(Request $request) {
        $categoryId = $request->input('category_id');
        $subcategories = Subcategory::where('cat_id', $categoryId)->pluck('name', 'id');
        return response()->json($subcategories);
    }
    
}

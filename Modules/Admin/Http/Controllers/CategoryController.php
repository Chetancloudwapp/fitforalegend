<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Subcategory;
use Modules\Admin\Entities\ChildCategory;
use Session;
use Validator;
use DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
{
    use ValidatesRequests;

    // category Index
    public function index()
    {
        // return view('admin::index');
        $categories = Categories::get();
        return view('admin::category.index')->with(compact('categories'));
    }
    
    // Add Category
    public function addEditCategory(Request $request, $id=Null)
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
                $req_fields['name']   = 'required';
            }
            else{
                $req_fields['name']   = 'required';
                $req_fields['image']   = 'required';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'image.required' => 'Image is required'
            ];

            $validation = Validator::make($request->all(),
                $req_fields,
                [
                    'required' => 'The :attribute field is required.',
                ],
                $customMessages
            );

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

            // $this->validate($request, $rules, $customMessages);

            $category->name = $data['name'];
            $category->status = $data['status'];
            if ($request->hasFile('image')) {
                $random_no  = uniqid();
                $img        = $request->file('image');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/categories');
                $img->move($destinationPath, $new_name);
                $category->image = $new_name;
            }
            $category->save();
            return redirect('admin/category')->with('success_message', $message);
        }
        return view('admin::category.addCategory')->with(compact('title','category'));
    }

     // Subcategory Index
    public function subcategoryindex()
    {    
        $subcategory = Subcategory::select('subcategories.*','category.name as cat_name')  
                        ->join('category', 'category.id', '=', 'subcategories.cat_id')
                        ->get();
        return view('admin::category.subcat_index')->with(compact('subcategory'));
    }

     // Add Subcategory
    public function subCategory(Request $request, $id="")
    {
        $get_parent_category = Categories::where('status', 'Active')->get();
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
                'name' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Name is required',
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
                         ->get();
        return view('admin::category.childcat_index')->with(compact('ChildCategory'));
    }

    /* ----Add CHILD CATEGORY---  */

    public function addChildCategory(Request $request, $id="")
    {
        // $ChildCategory = ChildCategory::find($id);
        $get_parent_category = Categories::where('status', 'Active')->get();
        // $get_sub_category = Subcategory::where('status', 'Active')->whereIn('cat_id', [$ChildCategory->cat_id])->get();
        $get_sub_category = Subcategory::where('status', 'Active')->get();
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
                $req_fields['name']   = 'required';
                $req_fields['parent_category'] = 'required';
                $req_fields['subcategory_id'] = 'required';
            }
            else{
                $req_fields['name']   = 'required';
                $req_fields['parent_category'] = 'required';
                $req_fields['subcategory_id'] = 'required';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'parent_category.required' => 'Parent Category is required',
                'subcategory_id.required' => 'Sub Category is required',
            ];

            $validation = Validator::make($request->all(),
                $req_fields,
                [
                    'required' => 'The :attribute field is required.',
                ],
                $customMessages
            );

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

            // $this->validate($request, $rules, $customMessages);
            $ChildCategory->name = $data['name'];
            $ChildCategory->cat_id = $data['parent_category'];
            $ChildCategory->subcategories_id = $data['subcategory_id'];
            $ChildCategory->save();
            // dd($ChildCategory);
            return redirect('admin/childcategory')->with('success_message', $message);
        }
        return view('admin::category.addchildcat')->with(compact('title','ChildCategory', 'get_sub_category', 'get_parent_category'));
    }

    /* --- Delete Category--- */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        Subcategory::where('cat_id', $id)->delete();
        ChildCategory::where('cat_id', $id)->delete();
        $category->delete();
        return redirect()->back()->with('success_message', 'Category Deleted Successfully!');
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

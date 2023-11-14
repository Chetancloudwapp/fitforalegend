<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Subcategory;
use Modules\Admin\Entities\ChildCategory;
use Modules\Admin\Entities\MasterBrand;
use Modules\Admin\Entities\MasterColor;
use Modules\Admin\Entities\MasterSize;
use Validator;
use DB;

class ProductController extends Controller
{
    use ValidatesRequests;

    /* --- VIEW PRODUCT --- */

    public function index()
    {
        $products = Product::get();
        return view('admin::product.index')->with(compact('products'));
    }


    /* --- Add Product--- */
    public function addProduct(Request $request, $id='')
    {
        
        $get_parent_category = Categories::where('status', 'Active')->get();
        $get_sub_category = Subcategory::where('status', 'Active')->get();
        $get_child_category = ChildCategory::where('status', 'Active')->get();
        $get_brands = MasterBrand::where('status','Active')->whereNull('deleted_at')->get();
        $get_colors = MasterColor::where('status','Active')->whereNull('deleted_at')->get();
        $get_size = MasterSize::whereNull('deleted_at')->get();
        if($id ==""){
            // Add Product
            $title = "Add Product";
            $products = new Product;
            $message = "Product Added Successfully!";
        }else{
            $title = "Edit Product";
            $id = decrypt($id);
            $products = Product::find($id);
            $message = "Product Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required';
            }
            else{
                $req_fields['name']   = 'required';
                $req_fields['selling_price'] = 'required';
                $req_fields['cost_price'] = 'required';
                $req_fields['brand'] = 'required';
                $req_fields['size'] = 'required';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'selling_price.required' => 'Selling is required',
                'cost_price.required' => 'Image is required',
                'brand.required' => 'Image is required'
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
           
            $products->name = $data['name'];            
            $products->selling_price = $data['selling_price'];
            $products->cost_price = $data['cost_price'];
            $products->brand = $data['brand'];
            $products->size = $data['size'];
            $products->color = $data['color'];
            $products->quantity = $data['quantity'];
            $products->product_weight = $data['product_weight'];
            $products->product_dimension = $data['product_dimension'];
            $products->video_link = $data['video_link'];
            $products->category = $data['parent_id'];
            $products->subcategory = $data['subcategory_id'];
            $products->childcategory = $data['childcategory_id'];
            $products->description = $data['description'];
            $products->specification_name = $data['specification_name'];
            $products->specification_description = $data['specification_description'];
            $products->meta_keywords = $data['meta_keywords'];
            $products->meta_description = $data['meta_description'];
            $products->status = $data['status'];
            if ($request->hasFile('featured_image')) {
                $random_no  = uniqid();
                $img        = $request->file('featured_image');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/products');
                $img->move($destinationPath, $new_name);
                $products->featured_image = $new_name;
            }
            if ($request->hasFile('gallery_images')) {
                $random_no  = uniqid();
                $img        = $request->file('gallery_images');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/products');
                $img->move($destinationPath, $new_name);
                $products->gallery_images = $new_name;
            }
            $products->save();
            return redirect('admin/product')->with('success_message', $message);
        }
        return view('admin::product.addproduct')->with(compact('title','products', 'get_parent_category', 'get_sub_category','get_child_category','get_brands', 'get_colors', 'get_size'));
    }


    /* ---Get Subcategories Dropdown--- */

    public function getSubcategory(Request $request) {
        $categoryId = $request->input('category_id');
        $subcategories = Subcategory::where('cat_id', $categoryId)->pluck('name', 'id');
        return response()->json($subcategories);
    }
    
    /* ---Get Childcategories Dropdown--- */

    public function getChildcategory(Request $request) {
        $subcategoryId = $request->input('subcategory_id');
        $childcategories = ChildCategory::where('subcategories_id', $subcategoryId)->pluck('name', 'id');
        return response()->json($childcategories);
    }

    /* --- DELETE PRODUCT --- */
    public function deleteProduct($id){
        $id = decrypt($id);
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->back()->with('success_message', 'Product Deleted Successfully');
    }


    /* ---- ADD VARIATION PRODUCT ----- */
    public function addVariation(Request $request, $id)
    {
        $get_brands = MasterBrand::where('status','Active')->get();
       
        $title = "product Variation";
        $id = decrypt($id);
        $products =  new Product;
        $message = "Variation Added Successfully!";
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $req_fields =  [];
            
            $req_fields['name']   = 'required';
            $req_fields['selling_price'] = 'required';
            $req_fields['cost_price'] = 'required';
            $req_fields['brand'] = 'required';
            $req_fields['size'] = 'required';
        
            $customMessages = [
                'name.required' => 'Name is required',
                'selling_price.required' => 'Selling is required',
                'cost_price.required' => 'Image is required',
                'brand.required' => 'Image is required'
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

            $products->name = $data['name'];
            $products->parent_id = $id;
            $products->selling_price = $data['selling_price'];
            $products->cost_price = $data['cost_price'];
            $products->brand = $data['brand'];
            $products->size = $data['size'];
            $products->color = $data['colorPicker'];
            $products->quantity = $data['quantity'];
            $products->video_link = $data['video_link'];
            $products->description = $data['description'];
            $products->specification_name = $data['specification_name'];
            $products->specification_description = $data['specification_description'];
            $products->meta_keywords = $data['meta_keywords'];
            $products->meta_description = $data['meta_description'];
            $products->status = $data['status'];
            if ($request->hasFile('featured_image')) {
                $random_no  = uniqid();
                $img        = $request->file('featured_image');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/products');
                $img->move($destinationPath, $new_name);
                $products->featured_image = $new_name;
            }
            if ($request->hasFile('gallery_images')) {
                $random_no  = uniqid();
                $img        = $request->file('gallery_images');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/products');
                $img->move($destinationPath, $new_name);
                $products->gallery_images = $new_name;
            }
            $products->save();
            return redirect('admin/product')->with('success_message', $message);
        }
        return view('admin::product.addvariation')->with(compact('title', 'products', 'get_brands'));
    }
}

<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Subcategory;
use Modules\Admin\Entities\ChildCategory;
use Modules\Admin\Entities\MasterBrand;
use Modules\Admin\Entities\Vendor;
use Modules\Admin\Entities\MasterColor;
use Illuminate\Support\Facades\Auth;
use Validator;


class VendorProductController extends Controller
{
    use ValidatesRequests;

    public function index(Request $request)
    {
        $vendor_id = Auth::guard('vendor')->user()->id;
        $vendor = Product::where('vendor_id', $vendor_id)->get();
        return view('vendor::product.index')->with(compact('vendor'));
    }

    public function addVendorProduct(Request $request, $id='')
    {
        
        $get_parent_category = Categories::where('status', 'Active')->get();
        $get_sub_category = Subcategory::where('status', 'Active')->get();
        $get_child_category = ChildCategory::where('status', 'Active')->get();
        $get_brands = MasterBrand::where('status','Active')->whereNull('deleted_at')->get();
        $get_colors = MasterColor::where('status','Active')->whereNull('deleted_at')->get();
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
            $products->vendor_id = Auth::guard('vendor')->user()->id;        
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
            return redirect('vendor/vendor-product')->with('success_message', $message);
        }
        return view('vendor::product.addVendorProducts')->with(compact('title','products', 'get_parent_category', 'get_sub_category','get_child_category','get_brands', 'get_colors'));
    }

    public function vendorShopView(Request $request)
    {
        $common = [];
        $common['title'] = 'Vendor Details';
        $vendor_id = Auth::guard('vendor')->user()->id;
        // dd($vendor_id);
        $vendors = Vendor::where('id', $vendor_id)->get();
        // dd($vendors);
        return view('vendor::shopDetails.index')->with(compact('common','vendors'));
    }

    // public function vendorShopView(Request $request, $id='')
    // {
    //     if($id ==""){
    //         // Add Product
    //         $title = "Add Vendors";
    //         $vendors = new Vendor;
    //         $message = "Vendor Added Successfully!";
    //     }else{
    //         $title = "Edit Vendor";
    //         $id = decrypt($id);
    //         $vendors = Vendor::find($id);
    //         $message = "Vendor Updated Successfully!";
    //     }
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // dd($data);
    //         $req_fields =  [];
    //         if($request->id !=''){
    //             $req_fields['first_name']   = 'required';
    //         }
    //         else{
    //             $req_fields['first_name']  = 'required|string|max:255';
    //             $req_fields['last_name']   = 'required|string|max:255';
    //             $req_fields['email'] = 'required|email|unique:vendors';
    //             $req_fields['mobile'] = 'required|min:5';
    //         }
            
    //         $customMessages = [
    //             'name.required' => 'Name is required',
    //             'email.required' => 'Email is required',
    //             'email.email' => 'Valid Email is required',
    //             'email.unique' => 'Unique Email is required',
    //             'mobile.required' => 'Mobile number is required'
    //         ];

    //         $validation = Validator::make($request->all(),
    //             $req_fields,
    //             [
    //                 'required' => 'The :attribute field is required.',
    //             ],
    //             $customMessages
    //         );

    //         if ($validation->fails()) {
    //             return back()->withErrors($validation)->withInput();
    //         }
           
    //         $vendors->first_name = $data['first_name'];            
    //         $vendors->last_name = $data['last_name'];            
    //         $vendors->mobile = $data['mobile'];
    //         $vendors->email = $data['email'];
    //         $vendors->password = Hash::make($data['password']);
    //         $vendors->shop_name = $data['shop_name'];
    //         $vendors->shop_address = $data['shop_address'];
    //         $vendors->country_code = $data['country_code'];
    //         $vendors->status = $data['status'];
    //         // if ($request->hasFile('featured_image')) {
    //         //     $random_no  = uniqid();
    //         //     $img        = $request->file('featured_image');
    //         //     $mime_type  =  $img->getMimeType();
    //         //     $ext        = $img->getClientOriginalExtension();
    //         //     $new_name   = $random_no . '.' . $ext;
    //         //     $destinationPath =  public_path('uploads/vendors');
    //         //     $img->move($destinationPath, $new_name);
    //         //     $vendors->featured_image = $new_name;
    //         // }
            
    //         $vendors->save();
    //         return redirect('admin/vendors')->with('success_message', $message);
    //     }
    //     return view('admin::vendors.addvendors')->with(compact('title','vendors','get_countries'));
    // }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('vendor::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('vendor::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

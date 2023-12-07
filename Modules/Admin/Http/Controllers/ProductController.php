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
use Modules\Admin\Entities\ProductsImage;
use Validator;
use DB;
use Image;

class ProductController extends Controller
{
    use ValidatesRequests;

    /* --- VIEW PRODUCT --- */

    public function index()
    {
        $products = Product::where('status', 'Active')->whereNull('deleted_at')->orderBy('id','desc')->get();
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
        // $get_images = ProductsImage::whereNull('deleted_at')->get();
        // dd($get_images);
        if($id ==""){
            // Add Product
            $title = "Add Product";
            $products = new Product();
            $message = "Product Added Successfully!";
        }else{
            $title = "Edit Product";
            // $id = decrypt($id);
            $products = Product::with('images')->find($id);
            // dd($products);
            // echo "<pre>"; print_r($products->toArray()); die;
            $message = "Product Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
            }
            else{
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
                $req_fields['selling_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                $req_fields['cost_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                $req_fields['brand'] = 'required';
                $req_fields['size'] = 'required';
                $req_fields['color'] = 'required';
                $req_fields['quantity'] = 'required';
                $req_fields['parent_id'] = 'required';
                $req_fields['subcategory_id'] = 'required';
                $req_fields['childcategory_id'] = 'required';
                $req_fields['featured_image'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'   => 'Valid name is required',
                'selling_price.required' => 'Selling price is required',
                'cost_price.required' => 'Cost Price is required',
                'brand.required' => 'Brand field is required',
                'size.required' => 'size is required',
                'color.required' => 'Color is required',
                'quantity.required' => 'Quantity is required',
                'parent_id.required'=> 'Category is required',
                'subcategory_id.required'=> 'Sub Category is required',
                'childcategory_id.required' => 'Child Category is required',
                'featured_image.required' => 'Image is required',
                'featured_image.mimes' => 'Valid Image is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
           
            // if ($request->hasFile('featured_image')) {
            //     $random_no  = uniqid();
            //     $img        = $request->file('featured_image');
            //     $mime_type  =  $img->getMimeType();
            //     $ext        = $img->getClientOriginalExtension();
            //     $new_name   = $random_no . '.' . $ext;
            //     $destinationPath =  public_path('uploads/products');
            //     $img->move($destinationPath, $new_name);
            //     $products->featured_image = $new_name;   
            // }

            // Upload featured Image
            if($request->hasFile('featured_image')){
            $image_tmp = $request->file('featured_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $large_image_path = public_path('uploads/products/featuredImages/large/'.$imageName);
                    $medium_image_path = public_path('uploads/products/featuredImages/medium/'.$imageName);
                    $small_image_path = public_path('uploads/products/featuredImages/small/'.$imageName);

                    // upload images
                    Image::make($image_tmp)->resize(1040, 1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(520, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(260, 300)->save($small_image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }
    
            $products->featured_image = $imageName;
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
            $products->short_description = strip_tags($data['short_description']);
            $products->description = strip_tags($data['description']);
            $products->specification_name = $data['specification_name'];
            $products->specification_description = strip_tags($data['specification_description']);
            $products->meta_keywords = $data['meta_keywords'];
            $products->meta_description = strip_tags($data['meta_description']);
            $products->status = $data['status'];
            $products->save();

            /*--- Add gallery Images with intervention package 
              $product_id = DB::getPdo()->lastInsertId(); we can extract id from products table like that also with the help of pdo method
            */

            /* --- Upload Gallery Image --- */
            if($request->hasFile('images')){
                $images = $request->file('images');
                // echo "<pre>"; print_r($images); die;
                foreach($images as $key => $image){
                    // Gen temp image
                    $image_temp = Image::make($image);
                    // Get Image Extension
                    $extension = $image->getClientOriginalExtension();

                    // Generate new Image Name
                    $imageName = 'product-'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = public_path('uploads/products/galleryImages/large/'.$imageName);
                    $medium_image_path = public_path('uploads/products/galleryImages/medium/'.$imageName);
                    $small_image_path = public_path('uploads/products/galleryImages/small/'.$imageName);

                    // upload images
                    Image::make($image_temp)->resize(1040, 1200)->save($large_image_path);
                    Image::make($image_temp)->resize(520, 600)->save($medium_image_path);
                    Image::make($image_temp)->resize(260, 300)->save($small_image_path);

                    // insert images in product Images table
                    $product_image = new ProductsImage;
                    $product_image->product_id = $products->id;
                    $product_image->image = $imageName;
                    $product_image->save();
                    // echo "<pre>"; print_r($product_image->toArray()); die;
                }
            }
            return redirect('admin/product')->with('success_message', $message);
        }
        return view('admin::product.addproduct')->with(compact('title','products', 'get_parent_category', 'get_sub_category','get_child_category','get_brands', 'get_colors', 'get_size'));
    }


     /* --- DELETE PRODUCT --- */
    public function deleteProduct($id){
        $products = Product::findOrFail($id);

        $featured_image_path = public_path('uploads/products/featuredImages/');
        if(file_exists($featured_image_path.$products->featured_image)){
            unlink($featured_image_path.$products->featured_image);
        }
        $products->delete();

        $productImage = ProductsImage::where('product_id', $id)->first();
        if($productImage){

            $small_image_path = public_path('uploads/products/galleryImages/small/');
            $medium_image_path = public_path('uploads/products/galleryImages/medium/');
            $large_image_path = public_path('uploads/products/galleryImages/large/');
    
            if(file_exists($small_image_path.$productImage->image)){
                unlink($small_image_path.$productImage->image);
            }
    
            if(file_exists($medium_image_path.$productImage->image)){
                unlink($medium_image_path.$productImage->image);
            }
    
            if(file_exists($large_image_path.$productImage->image)){
                unlink($large_image_path.$productImage->image);
            }
    
            $productImage = ProductsImage::where('product_id', $id)->delete();
        }

        return redirect()->back()->with('success_message', 'Product Deleted Successfully');
    }

    /* --- Delete Gallery Images --- */
    public function deleteProductImage($id)
    {
        $productImage = ProductsImage::where('id', $id)->first();
        // dd($productImage);
        
        /* --- get the path of gallery image */
        $small_image_path = public_path('uploads/products/galleryImages/small/');
        $medium_image_path = public_path('uploads/products/galleryImages/medium/');
        $large_image_path = public_path('uploads/products/galleryImages/large/');

        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        /* --- Delete gallery images --- */
        $productImage = ProductsImage::where('id', $id)->delete();       
        $message = "Product Image has been deleted Successfully!";
        return redirect('admin/product')->with('success_message', $message);
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

    /* ---- ADD VARIATION PRODUCT ----- */
    public function addVariation(Request $request, $id)
    {
        $get_brands = MasterBrand::where('status','Active')->get();
        // echo "<pre>"; print_r($product->toArray()); die;
        $get_size = MasterSize::whereNull('deleted_at')->get();
        $get_colors = MasterColor::where('status','Active')->whereNull('deleted_at')->get();
        $product = Product::where('id', decrypt($id))->where('status','Active')->whereNull('deleted_at')->get();
        
        
        
        $title = "product Variation";
        $id = decrypt($id);
        // $products = Product::where('')
        
        $products =  new Product;
        $message = "Variation Added Successfully!";
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
            }else{
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
                $req_fields['selling_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                $req_fields['cost_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
                $req_fields['brand'] = 'required';
                $req_fields['size'] = 'required';
                $req_fields['color'] = 'required';
                $req_fields['quantity'] = 'required';
                $req_fields['featured_image'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
            }
                
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'   => 'Valid name is required',
                'selling_price.required' => 'Selling price is required',
                'cost_price.required' => 'Cost Price is required',
                'brand.required' => 'Brand field is required',
                'size.required' => 'size is required',
                'color.required' => 'Color is required',
                'quantity.required' => 'Quantity is required',
                'featured_image.required' => 'Image is required',
                'featured_image.mimes' => 'Valid Image is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

            if($request->hasFile('featured_image')){
                $image_tmp = $request->file('featured_image');
                    if($image_tmp->isValid()){
                        // Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        // Generate new Image Name
                        $imageName = rand(111,99999).'.'.$extension;
                        $large_image_path = public_path('uploads/products/featuredImages/large/'.$imageName);
                        $medium_image_path = public_path('uploads/products/featuredImages/medium/'.$imageName);
                        $small_image_path = public_path('uploads/products/featuredImages/small/'.$imageName);

                          // upload images
                        Image::make($image_tmp)->resize(1040, 1200)->save($large_image_path);
                        Image::make($image_tmp)->resize(520, 600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(260, 300)->save($small_image_path);

                    }
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];
                }else{
                    $imageName = "";
                }

            $products->featured_image = $imageName;
            $products->name = $data['name'];
            $products->parent_id = $id;
            $products->selling_price = $data['selling_price'];
            $products->cost_price = $data['cost_price'];
            $products->brand = $data['brand'];
            $products->size = $data['size'];
            $products->color = $data['color'];
            $products->quantity = $data['quantity'];
            $products->video_link = $data['video_link'];
            $products->category = $data['parent_id'];
            $products->subcategory = $data['subcategory_id'];
            $products->childcategory = $data['childcategory_id'];
            $products->short_description = strip_tags($data['short_description']);
            $products->description = strip_tags($data['description']);
            $products->specification_name = $data['specification_name'];
            $products->specification_description = strip_tags($data['specification_description']);
            $products->meta_keywords = $data['meta_keywords'];
            $products->meta_description = strip_tags($data['meta_description']);
            $products->status = $data['status'];

            // echo "<pre>"; print_r($products->toArray()); die;
            
            $products->save();
           
             // Upload Gallery Image
             if($request->hasFile('images')){
                $images = $request->file('images');
                // echo "<pre>"; print_r($images); die;
                foreach($images as $key => $image){
                    // Gen temp image
                    $image_temp = Image::make($image);
                    // Get Image Extension
                    $extension = $image->getClientOriginalExtension();

                    // Generate new Image Name
                    $imageName = 'product-'.rand(1111,9999999).'.'.$extension;
                    $large_image_path = public_path('uploads/products/galleryImages/large/'.$imageName);
                    $medium_image_path = public_path('uploads/products/galleryImages/medium/'.$imageName);
                    $small_image_path = public_path('uploads/products/galleryImages/small/'.$imageName);

                    // upload images
                    Image::make($image_temp)->resize(1040, 1200)->save($large_image_path);
                    Image::make($image_temp)->resize(520, 600)->save($medium_image_path);
                    Image::make($image_temp)->resize(260, 300)->save($small_image_path);

                    // insert images in product Images table
                    $product_image = new ProductsImage;
                    $product_image->product_id = $products->id;
                    $product_image->image = $imageName;
                    $product_image->save();
                    // echo "<pre>"; print_r($product_image->toArray()); die;
                }
            }
            
            return redirect('admin/product')->with('success_message', $message);
        }
        return view('admin::product.addvariation')->with(compact('title', 'products', 'get_size','get_brands','get_colors','product'));
    }
}

/* Root delete code starts here */
 /* --- Add Product--- */
//  public function addProduct(Request $request, $id='')
//  {
//      $get_parent_category = Categories::where('status', 'Active')->get();
//      $get_sub_category = Subcategory::where('status', 'Active')->get();
//      $get_child_category = ChildCategory::where('status', 'Active')->get();
//      $get_brands = MasterBrand::where('status','Active')->whereNull('deleted_at')->get();
//      $get_colors = MasterColor::where('status','Active')->whereNull('deleted_at')->get();
//      $get_size = MasterSize::whereNull('deleted_at')->get();
//      if($id ==""){
//          $title = "Add Product";
//          $products = new Product();
//          $message = "Product Added Successfully!";
//      }else{
//          $title = "Edit Product";
//          $products = Product::with('images')->find($id);
//          $message = "Product Updated Successfully!";
//      }
//      if($request->isMethod('post')){
//          $data = $request->all();
//          $req_fields =  [];
//          if($request->id !=''){
//              $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
//          }
//          else{
//              $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
//              $req_fields['selling_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
//              $req_fields['cost_price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
//              $req_fields['brand'] = 'required';
//              $req_fields['size'] = 'required';
//              $req_fields['color'] = 'required';
//              $req_fields['quantity'] = 'required';
//              $req_fields['parent_id'] = 'required';
//              $req_fields['subcategory_id'] = 'required';
//              $req_fields['childcategory_id'] = 'required';
//              $req_fields['featured_image'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
//          }
         
//          $customMessages = [
//              'name.required' => 'Name is required',
//              'name.regex'   => 'Valid name is required',
//              'selling_price.required' => 'Selling price is required',
//              'cost_price.required' => 'Cost Price is required',
//              'brand.required' => 'Brand field is required',
//              'size.required' => 'size is required',
//              'color.required' => 'Color is required',
//              'quantity.required' => 'Quantity is required',
//              'parent_id.required'=> 'Category is required',
//              'subcategory_id.required'=> 'Sub Category is required',
//              'childcategory_id.required' => 'Child Category is required',
//              'featured_image.required' => 'Image is required',
//              'featured_image.mimes' => 'Valid Image is required',
//          ];

//          $validation = Validator::make($request->all(), $req_fields, $customMessages);

//          if ($validation->fails()) {
//              return back()->withErrors($validation)->withInput();
//          }
    

//          if($request->hasFile('featured_image')){
//          $image_tmp = $request->file('featured_image');
//              if($image_tmp->isValid()){
//                  $extension = $image_tmp->getClientOriginalExtension();
//                  $imageName = rand(111,99999).'.'.$extension;
//                  $image_path = public_path('uploads/products/'.$imageName);
//                  Image::make($image_tmp)->save($image_path);
//              }
//          }
//          $products->featured_image = $imageName;
//          $products->name = $data['name'];            
//          $products->selling_price = $data['selling_price'];
//          $products->cost_price = $data['cost_price'];
//          $products->brand = $data['brand'];
//          $products->size = $data['size'];
//          $products->color = $data['color'];
//          $products->quantity = $data['quantity'];
//          $products->product_weight = $data['product_weight'];
//          $products->product_dimension = $data['product_dimension'];
//          $products->video_link = $data['video_link'];
//          $products->category = $data['parent_id'];
//          $products->subcategory = $data['subcategory_id'];
//          $products->childcategory = $data['childcategory_id'];
//          $products->short_description = strip_tags($data['short_description']);
//          $products->description = strip_tags($data['description']);
//          $products->specification_name = $data['specification_name'];
//          $products->specification_description = strip_tags($data['specification_description']);
//          $products->meta_keywords = $data['meta_keywords'];
//          $products->meta_description = strip_tags($data['meta_description']);
//          $products->status = $data['status'];
//          $products->save();

        

//          if($request->hasFile('images')){
//              $images = $request->file('images');
//              foreach($images as $key => $image){
//                  $image_temp = Image::make($image);
//                  $extension = $image->getClientOriginalExtension();

//                  $imageName = 'product-'.rand(1111,9999999).'.'.$extension;
//                  $small_image_path = public_path('uploads/products/galleryImages/small/'.$imageName);
//                  $medium_image_path = public_path('uploads/products/galleryImages/medium/'.$imageName);

//                  Image::make($image_temp)->resize(260, 300)->save($small_image_path);
//                  Image::make($image_temp)->resize(520, 600)->save($medium_image_path);

//                  $product_image = new ProductsImage;
//                  $product_image->product_id = $products->id;
//                  $product_image->image = $imageName;
//                  $product_image->save();
//              }
//          }
//          return redirect('admin/product')->with('success_message', $message);
//      }
//      return view('admin::product.addproduct')->with(compact('title','products', 'get_parent_category', 'get_sub_category','get_child_category','get_brands', 'get_colors', 'get_size'));
//  }

//  public function deleteProductImage($id)
//  {
//      $productImage = ProductsImage::where('id', $id)->delete();

//      $small_image_path = public_path('uploads/products/galleryImages/small/');
//      $medium_image_path = public_path('uploads/products/galleryImages/medium/');

//      if(file_exists($small_image_path.$productImage->image)){
//          unlink($small_image_path.$productImage->image);
//      }

//      if(file_exists($medium_image_path.$productImage->image)){
//          unlink($medium_image_path.$productImage->image);
//      }

//      Delete product images
    
//      $productImage->delete();

//      $message = "Product Image has been deleted Successfully!";
//      return redirect('admin/product')->with('success_message', $message);
//  } 

// root ="{{ config('app.url')}}"
//                 // alert(root);
//                 // window.location.href = "/admin/delete_"+record+"/"+record_id;
//                 window.location.href= root+ "admin/"+record+"/"+record_id;



// <div class="col-md-6">
// <div class="form-group mb-3 {{ $errors->has('images') ? 'has-danger' : '' }}">
//     <label class="col-form-label">Gallery Images : (Recommend Size: Less than 2 Mb)</label>
//     <input type="file"
//         class="form-control {{ $errors->has('images') ? 'form-control-danger' : '' }}"
//         onchange="loadFile(event,'image_1')"  name="images[]" multiple="" id="images">
//     @error('images')
//     <div class="col-form-alert-label">
//         {{ $message }}
//     </div>
//     @enderror
// </div>
// <div class="media-left">
//     <a href="#" class="profile-image">
//         <table cellpadding="4" cellspacing="4" border="1" style="margin:15px;">
//         <tr>
//         @foreach($products['images'] as $value)
//             <td style="background-color: #f9f9f9;">
//             @if($value['product_id'] == $products['id'])
//                 <a target="_blank" href="{{ asset('uploads/products/galleryImages/small/'. $value['image'])}}"><img src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/small/'. $value['image']) : asset('assets/upload//placeholder.png') }}" width="120px" class="user-img img-css" id="image_1">
//                 </a>&nbsp;
//                 <a href="javascript:void(0)" title="Delete Product" record="product/deleteImage" record_id="{{ $value['id']}}" 

//                 class="confirmDelete" name="product" title="Delete Product Image"> <i class="fa-solid fa-trash" ></i> 
//                 </a>
//             @endif  
//             </td>    
//         @endforeach
//         </tr>
//         </table>
//     </a>
// </div>
// </div>
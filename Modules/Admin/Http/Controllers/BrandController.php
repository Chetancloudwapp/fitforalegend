<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Admin\Entities\MasterBrand;
use Validator;
use Image;
use DB;

class BrandController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $common = [];
        $common['title'] = "Brands";
        $brands = MasterBrand::where('status', 'Active')->whereNull('deleted_at')->orderBy('id', 'desc')->get();
        return view('admin::brands.index')->with(compact('common', 'brands'));
    }

    /* --- ADD BRANDS --- */
    public function addbrands(Request $request, $id='')
    {
        if($request->id==""){
            // Add Product
            $title = "Add Brands";
            $brands = new MasterBrand;
            // $slug = Str::slug($request->slug);
            $message = "Brand Added Successfully!";
        }else{
            $title = "Edit Brands";
            $id = decrypt($id);
            // $myslug = Str::slug($request->slug);
            $brands = MasterBrand::find($id);
            $message = "Brand Updated Successfully!";
        }
        if($request->method('post') == 'POST'){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required|regex:/^[^\d]+$/|min:2|max:255';
            }
            else{
                $req_fields['name']   = 'required|regex:/^[^\d]+$/|min:2|max:255';
                $req_fields['image']  = 'mimes:jpeg,jpg,png,gif|required|max:10000';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'    => 'Brand name must be Proper',
                'image.required' => 'Image is required',
                'image.image'    => 'Valid Image is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }

             // Upload Brands Image
            if($request->hasFile('image')){
            $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = public_path('uploads/brands/'.$imageName);
                    Image::make($image_tmp)->save($image_path);
                }
            }else if(!empty($data['current_image'])){
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            $brands->image = $imageName;
            $brands->name = $data['name'];         
            // $brands->slug = $slug; 
            $brands->status = $data['status'];
            $brands->save();
            // dd($brands);
            // echo "<pre>"; print_r($brands->toArray()); die;
            return redirect('admin/brands')->with('success_message', $message);
        }
        return view('admin::brands.addbrand')->with(compact('title','brands'));
    }

    /* --- Delete Brands --- */
    public function deletebrands($id){
        // return $id;
        // $id = decrypt($id);
        // dd($id);
        $brands = MasterBrand::findOrFail($id);
        $brands->delete();
        return redirect()->back()->with('success_message', 'Brand Deleted Successfully!');
    }
}

/*
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,less-or-less normal distribution of letters, as opposed to using 'content here content here making it look like readable English . 
*/

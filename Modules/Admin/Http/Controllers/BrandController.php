<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\MasterBrand;
use Validator;
use DB;
use Image;

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
            $message = "Brand Added Successfully!";
        }else{
            $title = "Edit Product";
            $id = decrypt($id);
            $brands = MasterBrand::find($id);
            $message = "Brand Updated Successfully!";
        }
        if($request->method('post') == 'POST'){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $req_fields =  [];
            if($request->id !=''){
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
            }
            else{
                $req_fields['name']   = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255';
                $req_fields['image']  = 'mimes:jpeg,jpg,png,gif|required|max:10000';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'    => 'Valid name is required',
                'image.required' => 'Image is required',
                'image.mimes'    => 'Valid Image is required',
            ];

            $validation = Validator::make($request->all(), $req_fields, $customMessages);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }


            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'uploads/brands/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                }
            }
            $brands->image = $imageName;
            $brands->name = $data['name'];          
            $brands->status = $data['status'];

            // if ($request->hasFile('image')) {
            //     $random_no  = uniqid();
            //     $img        = $request->file('image');
            //     $mime_type  =  $img->getMimeType();
            //     $ext        = $img->getClientOriginalExtension();
            //     $new_name   = $random_no . '.' . $ext;
            //     $destinationPath =  public_path('uploads/brands');
            //     $img->move($destinationPath, $new_name);
            //     $brands->image = $new_name;
            // }
            $brands->save();
            // echo "<pre>"; print_r($brands); die;
            return redirect('admin/brands')->with('success_message', $message);
        }
        return view('admin::brands.addbrand')->with(compact('title','brands'));
    }

    /* --- Delete Brands --- */
    public function deletebrands($id){
        $id = decrypt($id);
        $brands = MasterBrand::findOrFail($id);
        $brands->delete();
        return redirect()->back()->with('success_message', 'Brand Deleted Successfully!');
    }
}

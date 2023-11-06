<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\MasterBrand;
// use Illuminate\Support\Facades\Crypt;
use Validator;
use DB;


class BrandController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $brands = MasterBrand::get();
        return view('admin::brands.index')->with(compact('brands'));
    }

    public function addbrands(Request $request, $id='')
    {
        
        if($request->id==""){
            // Add Product
            $title = "Add Brands";
            $brands = new MasterBrand;
            $message = "Brand Added Successfully!";
        }else{
            $title = "Edit Product";
            // $id = base64_decode($id);
            $brands = MasterBrand::find($request->id);
            // dd($products);
            $message = "Brand Updated Successfully!";
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
    
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
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

            $brands->name = $data['name'];          
            $brands->status = $data['status'];
            if ($request->hasFile('image')) {
                $random_no  = uniqid();
                $img        = $request->file('image');
                $mime_type  =  $img->getMimeType();
                $ext        = $img->getClientOriginalExtension();
                $new_name   = $random_no . '.' . $ext;
                $destinationPath =  public_path('uploads/brands');
                $img->move($destinationPath, $new_name);
                $brands->image = $new_name;
            }
            $brands->save();
            return redirect('admin/brands')->with('success_message', $message);
        }
        return view('admin::brands.addbrand')->with(compact('title','brands'));
    }

    // Delete Brands 
    public function deletebrands($id){
        $brands = MasterBrand::findOrFail($id);
        $brands->delete();
        return redirect()->back()->with('success_message', 'Brand Deleted Successfully!');
    }

    public function create()
    {
        return view('admin::create');
    }


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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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

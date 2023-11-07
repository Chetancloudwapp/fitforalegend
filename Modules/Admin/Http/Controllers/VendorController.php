<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Vendor;
use Validator;
use Hash;

class VendorController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $common = [];
        $common['title'] = 'Vendors';
        $vendors = Vendor::get();
        return view('admin::vendors.index')->with(compact('common', 'vendors'));
    }

    public function addVendors(Request $request, $id='')
    {
        if($id ==""){
            // Add Product
            $title = "Add Vendors";
            $vendors = new Vendor;
            $message = "Vendor Added Successfully!";
        }else{
            $title = "Edit Vendor";
            $id = decrypt($id);
            $vendors = Vendor::find($id);
            $message = "Vendor Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $req_fields =  [];
            if($request->id !=''){
                $req_fields['first_name']   = 'required';
            }
            else{
                $req_fields['first_name']   = 'required';
                $req_fields['last_name']   = 'required';
                $req_fields['email'] = 'required|email|unique:vendors';
                $req_fields['mobile'] = 'required';
            }
            
            $customMessages = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'email.unique' => 'Unique Email is required',
                'mobile.required' => 'Mobile number is required'
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
           
            $vendors->first_name = $data['first_name'];            
            $vendors->last_name = $data['last_name'];            
            $vendors->mobile = $data['mobile'];
            $vendors->email = $data['email'];
            $vendors->password = Hash::make($data['password']);
            $vendors->shop_name = $data['shop_name'];
            $vendors->shop_address = $data['shop_address'];
            $vendors->country_code = $data['country_code'];
            $vendors->status = $data['status'];
            // if ($request->hasFile('featured_image')) {
            //     $random_no  = uniqid();
            //     $img        = $request->file('featured_image');
            //     $mime_type  =  $img->getMimeType();
            //     $ext        = $img->getClientOriginalExtension();
            //     $new_name   = $random_no . '.' . $ext;
            //     $destinationPath =  public_path('uploads/vendors');
            //     $img->move($destinationPath, $new_name);
            //     $vendors->featured_image = $new_name;
            // }
            
            $vendors->save();
            return redirect('admin/vendors')->with('success_message', $message);
        }
        return view('admin::vendors.addvendors')->with(compact('title','vendors'));
    }

     /* --- Delete Vendors --- */
     public function deletevendors($id)
     {
         $id = decrypt($id);
         $vendors = Vendor::findOrFail($id);
         $vendors->delete();
         return redirect()->back()->with('success_message', 'Vendor Deleted Successfully!');    
     }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

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

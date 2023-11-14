<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\MasterSize;
use Validator;

class SizeController extends Controller
{
    use ValidatesRequests;
    
    public function index()
    {
        $size = MasterSize::get();
        return view('admin::size.index')->with(compact('size'));
    }

    /* -- Add Size -- */
    public function addSize(Request $request, $id='')
    {
        if($request->id==""){
            // Add size
            $title = "Add Size";
            $size = new MasterSize;
            $message = "Size Added Successfully!";
        }else{
            $title = "Edit Size";
            $id = decrypt($id);
            $size = MasterSize::find($id);
            $message = "Size Updated Successfully!";
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

            $size->name = $data['name'];          
            $size->save();
            return redirect('admin/size')->with('success_message', $message);
        }
        return view('admin::size.addsize')->with(compact('title','size'));
    }

       /* --- Delete size --- */
    public function deletesize($id)
    {
        $id = decrypt($id);
        $size = MasterSize::findOrFail($id);
        $size->delete();
        return redirect()->back()->with('success_message', 'Size Deleted Successfully!');    
    } 
}

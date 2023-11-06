<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\MasterColor;
use Validator;

class ColorController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $color = MasterColor::get();
        return view('admin::color.index')->with(compact('color'));
    }

    /* --- Add Colors--- */
    public function addcolors(Request $request, $id='')
    {
        
        if($request->id==""){
            // Add Colors
            $title = "Add Colors";
            $colors = new MasterColor;
            $message = "Color Added Successfully!";
        }else{
            $title = "Edit Color";
            $id = decrypt($id);
            $colors = MasterColor::find($id);
            $message = "Color Updated Successfully!";
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

            $colors->name = $data['name'];          
            $colors->color_code = $data['colorPicker'];          
            $colors->status = $data['status'];
            $colors->save();
            return redirect('admin/color')->with('success_message', $message);
        }
        return view('admin::color.addcolors')->with(compact('title','colors'));
    }


    /* --- Delete Color --- */
    public function deletecolor($id)
    {
        $id = decrypt($id);
        $color = MasterColor::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success_message', 'Color Deleted Successfully!');    
    }
}
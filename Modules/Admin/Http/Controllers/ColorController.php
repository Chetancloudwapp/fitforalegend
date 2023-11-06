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

    public function addcolors(Request $request, $id='')
    {
        
        if($request->id==""){
            // Add Colors
            $title = "Add Colors";
            $colors = new MasterColor;
            $message = "Color Added Successfully!";
        }else{
            $title = "Edit Color";
            // $id = base64_decode($id);
            $colors = MasterColor::find($request->id);
            // dd($products);
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

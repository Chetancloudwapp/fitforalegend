<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Vendor;
use Validator;
use Auth;

class VendorController extends Controller
{
    use ValidatesRequests;
    public function vendorDashboard()
    {
        return view('vendor.dashboard');
    }

    public function Vendorlogin(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules , $customMessages);

            if(Auth::guard('vendor')->attempt(['email'=>$data['email'], 'password'=> $data['password']])){
                return redirect('vendor/vendor-dashboard');
            }else{
                // return back()->withErrors(['error' => "Invalid Username or Password!"]);
                return redirect()->back()->with("error_message", "Invalid Email or Password");
            }
        }
        return view('vendor.login');
    }

    public function vendorLogout(){
        Auth::guard('vendor')->logout();
        return redirect('vendor/vendor-login');
    }

    public function editvendorShop(Request $request)
    {
        return view('vendor::create');

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

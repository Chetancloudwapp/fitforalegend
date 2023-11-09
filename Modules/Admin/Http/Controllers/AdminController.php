<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Admin\Entities\Admin;
use Auth;
use Validator;
use Hash;
use Session;

class AdminController extends Controller
{
    use ValidatesRequests;

    /* --- view Dashboard --- */
    public function dashboard(){
        return view('admin.dashboard');
    }

    /* --- login View --- */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            // $validation = Validator::make($request->all(),
            // $rules,
            // [
            //     'required' => 'The :attribute field is required.',
            // ],
            // $customMessages
            // );

            // if ($validation->fails()) {
            //     return back()->withErrors($validation)->withInput();
            // }

            $this->validate($request, $rules , $customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=> $data['password']])){
                return redirect('admin/dashboard');
            }else{
                // return back()->withErrors(['error' => "Invalid Username or Password!"]);
                return redirect()->back()->with("error_message", "Invalid Email or Password");
            }
        }
        return view('admin.login');
    }

    /* --- Admin logout --- */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    /* --- Change Password --- */
    public function ChangePassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // Check if current password is correct
           if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
               // check if new password and confirm password are matching 
               if($data['new_pwd'] == $data['confirm_pwd']){
                  // update new password
                  Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                  return redirect()->back()->with('success_message', 'Password Updated Successfully!');
               }else{
                   return redirect()->back()->with('error_message', 'New password and confirm password does not Match!');
               }
           }else{
              return redirect()->back()->with('error_message', 'Your old password is Incorrect!');
           }
        }
        return view('admin.change_password');
    }

    public function CheckCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function ViewProfile()
    {
        return view('admin.view_Profile');
    }

    public function EditProfile(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'  => 'required|max:255',
                'email' => 'required|email|max:255',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'name.required' => 'Name is required',
            ];

            $this->validate($request, $rules , $customMessages);

            $admin_id = Auth::guard('admin')->user()->id;
            $admin = Admin::where('id', $admin_id)->first();
            // dd($admin);
            if(!empty($admin)){
                // return "hello";
                $admin->name = $data['name'];
                $admin->email = $data['email'];
                $admin->save();
                return redirect()->back()->with('success_message', 'Profile Updated Successfully!');
            }else{
                return redirect()->back()->with('error_message', 'Something Went Wrong!');
            }
        }

        return view('admin.edit_profile');
    }
}

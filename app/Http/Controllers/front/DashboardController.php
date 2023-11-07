<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Auth;
use Validator;
use Session;

class DashboardController extends Controller
{
     public function home(){
        Session::put('page', 'Dashboard');
        return view('front.home');
    }

    public function dashboard()
    {
        return view('front.dashboard');
    }

    public function register_user(Request $request)
    {
        if($request->isMethod('post')){
          
            $rules = [
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|max:30',
                'confirm_password' => 'required|same:password',
                'first_name' => 'required||string|min:3|max:200',
                'last_name' => 'required|min:3|max:200'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules , $customMessages);

            $users = new User;
            $users->name = $request->first_name.'.'.$request->last_name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();
            return redirect('/dashboard')->with('success_message', 'Account Created Successfully!');

            // if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=> $data['password']])){
            //     return redirect('admin/dashboard');
            // }else{
            //     return redirect()->back()->with("error_message", "Invalid Email or Password");
            // }
        }
        // return view('admin.login');
        return view('front.registerUser');
    }

    public function user_login(Request $request)
    {
        // return "hello";
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|exists:users|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules , $customMessages);

            if(Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=> $data['password']])){
                return redirect('/dashboard');
            }else{
                return redirect()->back()->with("error_message", "Invalid Email or Password");
            }
        }
        return view('front.login');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('web.login');
    }
}

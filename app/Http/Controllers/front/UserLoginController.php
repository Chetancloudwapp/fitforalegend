<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Admin\Entities\Country;
use Hash;
use Auth;
use Validator;
use Session;

class UserLoginController extends Controller
{
     public function home(){
        // Session::put('page', 'Dashboard');
        return view('front.home');
    }

    public function dashboard()
    {
        return view('front.dashboard');
    }

    public function register_user(Request $request)
    {
        $get_countries = Country::get();
        if($request->isMethod('post')){
          
            $rules = [
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255', 
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255', 
                'email' => 'required|email|unique:users',
                'password' => 'required|max:30',
                'confirm_password' => 'required|same:password',
            ];

            $customMessages = [
                'first_name.required' => 'First name is required',
                'first_name.regex' => 'Valid name is required',
                'last_name.required' => 'Last name is required',
                'last_name.regex' => 'Valid name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'email.unique' => 'Unique email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules , $customMessages);

            $users = new User;
            $users->first_name = $request->first_name;
            $users->last_name = $request->last_name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->country_code = $request->country_code;
            $users->mobile = $request->mobile;
            $users->gender = $request->gender;
            $users->save();
            // dd($users);
            return redirect('web/user_login')->with('success_message', 'Account Created Successfully!');

            // if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=> $data['password']])){
            //     return redirect('admin/dashboard');
            // }else{
            //     return redirect()->back()->with("error_message", "Invalid Email or Password");
            // }
        }
        // return view('admin.login');
        return view('front.registerUser')->with(compact('get_countries'));
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
                return redirect('web/dashboard');
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

    public function editProfile(Request $request)
    {
        $get_countries = Country::get();
        if($request->isMethod('post')){
            $data = $request->all();
                  
            $rules = [
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255', 
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255', 
                'email' => 'required|email',
                'mobile' => 'required|min:10',
            ];

            $customMessages = [
                'first_name.required' => 'First name is required',
                'first_name.regex' => 'Valid name is required',
                'last_name.required' => 'Last name is required',
                'last_name.regex' => 'Valid name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
            ];

            $this->validate($request, $rules , $customMessages);
                    
            User::where('id', Auth::guard('web')->user()->id)->update(['first_name'=>$data['first_name'], 'last_name'=>$data['last_name'],'email'=>$data['email'], 'mobile'=>$data['mobile'],'country_code'=> $data['country_code']]);

            return redirect('web/dashboard')->with('success_message', 'Profile Updated Successfully!');
        }
        return view('front.edit_profile')->with(compact('get_countries'));
    }
}

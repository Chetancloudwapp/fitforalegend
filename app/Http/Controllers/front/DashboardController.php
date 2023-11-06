<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Session;

class DashboardController extends Controller
{
     public function dashboard(){
        Session::put('page', 'Dashboard');
        return view('front.dashboard');
    }

    public function create_account(Request $request)
    {
        return view('front.account-create');
    }
}

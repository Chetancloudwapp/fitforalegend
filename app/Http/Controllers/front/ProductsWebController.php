<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Categories;


class ProductsWebController extends Controller
{
    // $id is category id here 
    public function productListing(Request $request)
    {
        $request->category;
        $sub = $request->subcategory;
        // return $sub;
        // $request->category;
        // $request->category;
    
        $get_categories = Categories::where('status', 'Active')->with(['products'=>function($query) use($sub){
            $query->where('subcategory',$sub);
            $query->orderBy('id','desc');
        }])->get()->toArray();

        // dd($get_categories);
        return view('front.categories')->with(compact('get_categories'));
    }
}

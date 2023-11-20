<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Product;

class ProductsWebController extends Controller
{
    // $id is category id here 
    public function productListing(Request $request)
    {
        $request->category;
        $sub = $request->subcategory;
        $childcategory_id = $request->childcategory;
        // return $sub;
        // $request->category;
        // $request->category;
    
        if(isset($request->childcategory)){
            $get_categories = Categories::where('status', 'Active')->with(['products'=>function($query) use($childcategory_id){
                // $query->where('subcategory',$sub);
                $query->where('childcategory',$childcategory_id);
                $query->orderBy('id','desc');
            }])->get()->toArray();
        }else{
            $get_categories = Categories::where('status', 'Active')->with(['products'=>function($query) use($sub){
                $query->where('subcategory',$sub);
                $query->orderBy('id','desc');
            }])->get()->toArray();
        }

        // if(isset($request->subcategory)){
        // }

        // dd($get_categories);
        return view('front.categories')->with(compact('get_categories'));
    }

    public function productDetail(Request $request, $id)
    {
        $product = Product::find($id);
        // Get the product details
        $get_product_details = Categories::where('status', 'Active')->where('id', $product['category'])->with(['products'=>function($query){
            $query->orderBy('id','desc');
        }])->get()->toArray();
        return view('front.productDetail')->with(compact('product', 'get_product_details'));
    }
}

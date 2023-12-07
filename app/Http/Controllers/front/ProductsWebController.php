<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\ProductsImage;
use Modules\Admin\Entities\MasterSize;
use Modules\Admin\Entities\MasterColor;
use App\Models\Cart;
use DB;
use Auth;

class ProductsWebController extends Controller
{
    // $id is category id here 
    public function productListing(Request $request)
    {
        $request->category;
        $sub = $request->subcategory;
        $childcategory_id = $request->childcategory;
        // if(isset($request->childcategory)){
        //     $get_categories = Categories::where('status', 'Active')->with(['products'=>function($query) use($childcategory_id){
        //         // $query->where('subcategory',$sub);
        //         $query->where('childcategory',$childcategory_id);
        //         $query->orderBy('id','desc');
        //     }
        //     ])->get()->toArray();
        // }else{
            //     $get_categories = Categories::where('status', 'Active')->with(['products'=>function($query) use($sub){
                //         $query->where('subcategory',$sub);
                //         $query->orderBy('id','desc');
                //     }
                //     ])->get()->toArray();
                // }
        
        if(isset($request->childcategory)){
            $get_products = Product::with('brands','sizes','colors')
                              ->where('childcategory', $childcategory_id)
                              ->paginate(6);
                            //   ->get()->toArray();
            // echo "<pre>"; print_r($get_products->toArray()); die;            
        }else{
            $get_products = Product::with('brands','sizes','colors')
                             ->where('subcategory', $sub)
                             ->paginate(6);
                            //  ->get()->toArray();
            // echo "<pre>"; print_r($get_products->toArray()); die;            
        }


        return view('front.productListing')->with(compact('get_products'));
    }   
    
    
    public function productDetail(Request $request, $id)
    {
        /* --- Get Gallery Images--- */
        // $get_images = ProductsImage::where('product_id', $id)->get();

        /* --- Finding the Product Id --- */
        $get_var_products = [];
        $product = Product::with('brands','sizes','colors','images')->find($id);
        // echo "<pre>"; print_r($product->toArray()); die;
        // $product = Product::where('id',$id)->first();
           
        $arr = [];
        $arr2 = [];
        if($product){
            /* --- get the variation product with the help of main product --- */
            if($product->parent_id==0){
                $get_var_products = Product::with('sizes','colors')->where('parent_id', $product->id)->orWhere('id', $id)->get();
    
                /* --- get sizes ---*/
                foreach($get_var_products as $row){
                    $arr[] = $row->sizes;
                }

                /* --- get colors ---*/
                foreach($get_var_products as $row){
                    $arr2[] = $row->colors;
                }

            //  echo "<pre>"; print_r($get_var_products->toArray()); die;
            }else{

                /* --- get main product as well as variation product */
                $parentId = $product->parent_id; 
                $get_var_products = Product::with('sizes','colors')->where('id', $parentId)
                                        ->orWhere(function ($query) use ($parentId, $id){
                                          $query->where('parent_id', $parentId);
                                        })->get();
                
                /* --- get sizes ---*/
                foreach($get_var_products as $row){
                    $arr[] = $row->sizes;
                }
                
                // return $arr;
                /* --- get colors ---*/
                foreach($get_var_products as $row){
                    $arr2[] = $row->colors;
                }
            }      

            /* --- get Category related product --- */
            $relatedProducts = Product::with('brands','colors','sizes','images')->where('category', $product['category'])->where('id', '!=', $id)->limit(4)->inRandomOrder()->get();                
        }

        return view('front.productDetail',compact('product','get_var_products','arr','arr2','relatedProducts'));
    }

    /* --- Get Product Price via Ajax--- */
    public function getProductPrice(Request $request)
    {
        if($request->ajax()){
        //    $data = $request->all();
            // echo "<pre>"; print_r($request->product_id); die;
         
            $getProductPrice = Product::getProductPrice($request->product_id, $request->size, $request->color_product_id,$request->color);
            // echo "<pre>"; print_r($getProductPrice); die;
            return $getProductPrice; 
        }
    }

    /* --- Add to Cart --- */
    public function addCart(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            /* --- Check Product Stock--- */
            $productStock = Product::select('quantity', 'status')->where(['id' => $data['product_id'], 'size' => $data['size']])->first();
            if($productStock){
                if($data['quantity'] > $productStock['quantity']){
                    $message = "Required Quantity is not Avaiable!";
                    return response()->json(['status' => false, 'message' => $message]);
                }
            }else{
                $message = "Product is not available for this size";
                return response()->json(['status' => false, 'message' => $message]);
            }
            
            /* --- Check Product Status--- */
            if($productStock['status'] == 'Deactive'){
                $message = "Product is not Avaiable!";
                return response()->json(['status' => false, 'message' => $message]);
            }

             /* --- Check if Product is already exists in cart --- */
            if(Auth::check()){
                // user is logged in
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'product_size'=> $data['size'], 'user_id' => $user_id])->count();

                if($countProducts>0){
                $message = "Product already exists in Cart!";
                return response()->json(['status'=> false, 'message'=> $message]);
                }

            /* --- Save Data in Database --- */
            $item = new Cart;
            $item->user_id = $user_id ;
            $item->product_id = $data['product_id'];
            $item->product_size = $data['size'];
            $item->product_quantity = $data['quantity'];
            $item->save();
            $message = "Product added Successfully in Cart!";
            return response()->json(['status'=> true, 'message'=> $message]);
            
            }else{        
            /* --- Store Data in Session if User is not logged in --- */
            $cart = $request->session()->get('cart', []);

            /* --- Add item to the cart --- */
            $cart[] = [
                'product_id' => $data['product_id'],
                'product_size' => $data['size'],
                'product_quantity' => $data['quantity'],
            ];
            
            if(Session::has('cart')){
                $message = "Product already exists in Cart!";
                return response()->json(['status' => false, 'message' => $message]);
            }

            /* --- Save updated cart to session --- */
            $request->session()->put('cart', $cart);     
            return response()->json(['status' => true, 'message' => 'Cart Saved Successfully!']);
            }
        }
    }

    /* --- View shopping Cart --- */
    public function viewCart()
    {
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);
        return view('front.product.addCart')->with(compact('getCartItems'));
    }

    /* --- Update cart item Quantity --- */
    public function updateCartItemQty(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            Cart::where('id', $data['cartid'])->update(['product_quantity' => $data['qty']]);
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'status'=>true, 
                'view'=>(String)View::make('front.product.cart_items')->with(compact('getCartItems'))
            ]);

        }
    }

    /* --- Delete Cart items --- */
    public function deleteCartItem(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            
            Cart::where('id', $data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'status' => true,
                'view' => (String)View::make('front.product.cart_items')->with(compact('getCartItems'))
            ]);
        }
    }
}
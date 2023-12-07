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

class CheckoutController extends Controller
{
    public function Checkout()
    {
        return view('front.product.checkout');

    }
}
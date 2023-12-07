<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Product;
use Auth;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'product_id',
        'product_size',
        'product_quantity',
    ];

    public static function getCartItems()
    {
        // if the user is logged in we use Auth to check the cart items 
        $user_id = Auth::user()->id;
        $getCartItems = Cart::with('product')->where('user_id', $user_id)->get()->toArray();
        return $getCartItems;
    }

    public function product()
    {
        return $this->belongsTo('Modules\Admin\Entities\Product', 'product_id')->with('brands','images','sizes', 'colors');
    }
}

<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductFactory::new();
    }

    public function brands(){
        return $this->hasOne('Modules\Admin\Entities\MasterBrand', 'id','brand')->select('id', 'name')->where('status', 'Active');
    }

    public function colors(){
        return $this->hasOne('Modules\Admin\Entities\MasterColor', 'id','color')->select('id', 'name', 'color_code')->where('status', 'Active');
    }

    public function sizes(){
        return $this->hasOne('Modules\Admin\Entities\MasterSize', 'id', 'size')->select('id', 'name');
    }

    public static function getProductPrice($id, $size, $color,$color_product_id)
    {        
        // print_r($size); die;
        $productPrice = Product::where(['id' =>$id, 'size' => $size ,'color'=>$color])->first()->toArray();
        return $productPrice;
    } 

    public function categories(){
        return $this->belongsTo('Modules\Admin\Entities\Categories', 'id', 'category')->select('id', 'name')->where('status', 'Active');
    }


    /* one product has many images that's why hasmany is used  */
    public function images(){
        return $this->hasMany('Modules\Admin\Entities\ProductsImage');
    }

    protected static function boot()
    {
        parent::boot();

        // Creating a slug before saving the product
        static::creating(function($products){
            $products->slug = Str::slug($products->name);
        });

        // updating the slug if the name changes 
        static::updating(function($products) {
            if($products->isDirty('name')) {
                $products->slug = Str::slug($products->name);
            }
        });
    }
}

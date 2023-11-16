<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Subcategory;
use Modules\Admin\Entities\ChildCategory;

class Categories extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = [];
    protected $table = "category";
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CategoriesFactory::new();
    }

    public static function categories(){
        $get_categories = categories::with('subcategories', 'subcategories.childcategories')->where('status', 'Active')->get()->toArray();
        // $get_categories = categories::with('subcategories', 'subcategories.childcategories')->where('status', 'Active')->get();
        return $get_categories;
    }

    public function subcategories(){
        return $this->hasMany('Modules\Admin\Entities\Subcategory', 'cat_id')->where('status', 'Active');
    }

    public function products(){
        return $this->hasMany('Modules\Admin\Entities\Product', 'category')->with('brands')->where('status', 'Active');
    }
    // public static function categories(){
    //     $getCategories = categories::with(['subcategories' => function($query){
    //         $query->with('subcategories');
    //     }])->where('status', 'Active')->get()->toArray();
    //     return $getCategories;
    // }

    // public function childcategories(){
    //     return $this->hasMany('Modules\Admin\Entities\ChildCategory', 'subcategories_id')->where('status', 'Active');
    // }

}

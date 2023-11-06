<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CategoryFactory::new();
    }

    public function parentcategory(){
        // for finding the parent categories
        return $this->hasOne('Modules\Admin\Entities\Category', 'id', 'parent_id')->select('id','category_name')->where('status', 1);
    }

    // Relation between categories and subcategories
    public function subcategories(){
        return $this->hasMany('Modules\Admin\Entities\Category', 'parent_id')->where('status', 1);
    }

    public static function getCategories(){
        $getCategories = Category::with(['subcategories' => function($query){
            $query->with('subcategories');
        }])->where('parent_id', 0)->where('status', 1)->get()->toArray();
        return $getCategories;
    }
}

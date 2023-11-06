<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];
    protected $table = "childcategories";
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ChildCategoryFactory::new();
    }

    // public function subcategory() {
    //     return $this->belongsTo(Category::class);
    // }

}

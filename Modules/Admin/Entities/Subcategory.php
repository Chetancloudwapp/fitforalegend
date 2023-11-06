<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Categories;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];
    protected $table = "subcategories";
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\SubcategoryFactory::new();
    }

    public function categories() {
        return $this->belongsTo(Categories::class);
    }

}

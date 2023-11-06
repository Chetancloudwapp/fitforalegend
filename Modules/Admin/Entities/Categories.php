<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Subcategory;

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

    public function subcategory() {
        return $this->hasMany(Subcategory::class);
    }

}

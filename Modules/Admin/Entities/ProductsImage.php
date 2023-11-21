<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProductsImageFactory::new();
    }
}

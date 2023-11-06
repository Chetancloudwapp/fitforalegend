<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterBrand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];
    protected $table = "master_brands";
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MasterBrandFactory::new();
    }
}

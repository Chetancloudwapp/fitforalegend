<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
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
}

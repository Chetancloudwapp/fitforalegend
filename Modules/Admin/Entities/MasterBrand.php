<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterBrand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];
    protected $table = "master_brands";
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MasterBrandFactory::new();
    }

    protected static function boot()
    {
        parent::boot();

        // Creating a slug before saving the brands
        static::creating(function ($brands) {
            $brands->slug = Str::slug($brands->name);
        });

        // Updating the slug if the name changes
        static::updating(function ($brands) {
            if ($brands->isDirty('name')) {
                $brands->slug = Str::slug($brands->name);
            }
        });
    }
}

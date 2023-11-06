<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // $this->call("OthersTableSeeder");

        $categoryRecords = [
            ['id'=>1,'parent_id'=>0,'category_name'=>'clothing','category_image'=>'','description'=>'','url'=>'clothing','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
            ['id'=>2,'parent_id'=>0,'category_name'=>'Electronics','category_image'=>'','description'=>'','url'=>'clothing','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
            ['id'=>3,'parent_id'=>0,'category_name'=>'Appliances','category_image'=>'','description'=>'','url'=>'clothing','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
            ['id'=>4,'parent_id'=>1,'category_name'=>'Men','category_image'=>'','description'=>'','url'=>'men','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
            ['id'=>5,'parent_id'=>1,'category_name'=>'Women','category_image'=>'','description'=>'','url'=>'Women','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
            ['id'=>6,'parent_id'=>1,'category_name'=>'Kids','category_image'=>'','description'=>'','url'=>'kids','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_delete'=>1, 'status'=>1],
        ];

        Category::insert($categoryRecords);
    }
}

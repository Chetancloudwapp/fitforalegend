<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Vendor;
use Hash;

class VendorTableSeeder extends Seeder
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
        $password = Hash::make('123456');
        $vendorRecords = [
            ['id'=>1, 'first_name' => 'Mukesh', 'last_name' => 'sood', 'mobile'=>7452621698,'email'=>'mukesh@gmail.com','password'=>$password,'shop_name'=>'mangal kirana', 'shop_address'=>'Nayapura','country_code'=>91, 'lat'=>'', 'long'=>'', 'status'=>'Active'],
            ['id'=>2, 'first_name' => 'Rajesh', 'last_name' => 'Malviya', 'mobile'=>9874523602,'email'=>'rajesh@gmail.com','password'=>$password,'shop_name'=>'Kapdaa Bazaar', 'shop_address'=>'indore','country_code'=>61, 'lat'=>'', 'long'=>'', 'status'=>'Active'],
            ['id'=>3, 'first_name' => 'Rocky', 'last_name' => 'Handsome', 'mobile'=>8885412365,'email'=>'rocky@gmail.com','password'=>$password,'shop_name'=>'Multiworld', 'shop_address'=>'mumbai','country_code'=>90, 'lat'=>'', 'long'=>'', 'status'=>'Active'],
            ['id'=>4, 'first_name' => 'Abdul', 'last_name' => 'Khalid', 'mobile'=>6541235658,'email'=>'abdul@gmail.com','password'=>$password,'shop_name'=>'Woodland', 'shop_address'=>'Lucknow','country_code'=>91, 'lat'=>'', 'long'=>'', 'status'=>'Active'],
        ];

        Vendor::insert($vendorRecords);

    }
}
